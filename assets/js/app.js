/*
 * HDX — Hydrox eSports | app.js
 */

/* ── EmailJS ────────────────────────────────────────────────── */
var EMAILJS_SERVICE_ID      = 'service_rfywpwb';
var EMAILJS_TEMPLATE_EQUIPA = 'template_s6r9k5i';
var EMAILJS_TEMPLATE_USER   = 'template_y2u30hf';
var EMAILJS_PUBLIC_KEY      = 'YsL-GUrHU2fo6_bEr';

/* ── Discord Webhooks ───────────────────────────────────────── */
var WEBHOOK_SUPPORT = 'https://discord.com/api/webhooks/1119355474752573522/YioYPuxcLheFz-NpnIn17vfeIuyS5QGv2KzSLGBZpN41ghxQ5BRW0MtIHkpeTkmhIEcA';
var WEBHOOK_JERSEY  = 'https://discord.com/api/webhooks/1164445845635223552/tp7OTNbaSWW1AAJFoZo5p-yPMTGAmb_ymJX1ZTfg4XQEQZjU6_txii8IjAarxJQTIek6';
var WEBHOOK_CAND    = 'https://discord.com/api/webhooks/1119086557807267930/ugu4ipUDZ2oa8z9nn22HRj8zYJJWcGNQDZWf0ob-xnPMcalAqlabU1W6TLsv2IvVR60c';

(function ($) {
    'use strict';

    /* =========================================================
       EmailJS — init
    ========================================================= */
    function initEmailJS() {
        if (typeof emailjs !== 'undefined') {
            emailjs.init({ publicKey: EMAILJS_PUBLIC_KEY });
        }
    }

    /* =========================================================
       EmailJS — enviar email para a equipa
    ========================================================= */
    async function enviarEmailEquipa(assunto, camposHtml) {
        if (typeof emailjs === 'undefined') return;
        try {
            await emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_EQUIPA, {
                assunto:     assunto,
                para_email:  'hydroxsport@gmail.com',
                campos_html: camposHtml
            });
        } catch (err) { console.error('EmailJS equipa:', err); }
    }

    /* =========================================================
       EmailJS — confirmação para o utilizador
    ========================================================= */
    async function enviarEmailUser(paraEmail, assunto, mensagem, camposHtml) {
        if (typeof emailjs === 'undefined' || !paraEmail) return;
        try {
            await emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_USER, {
                para_email:  paraEmail,
                assunto:     assunto,
                mensagem:    mensagem,
                campos_html: camposHtml
            });
        } catch (err) { console.error('EmailJS user:', err); }
    }

    /* =========================================================
       Formatar campos em HTML para o email
    ========================================================= */
    function camposParaHtml(campos) {
        var html = '<table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-top:16px;">';
        campos.forEach(function (c) {
            html += '<tr>'
                + '<td style="padding:8px 12px;background:#222;color:#af1515;font-weight:bold;font-size:13px;white-space:nowrap;border-bottom:1px solid #333;width:35%;">' + c.nome + '</td>'
                + '<td style="padding:8px 12px;background:#1a1a1a;color:#ddd;font-size:14px;border-bottom:1px solid #333;">' + (c.valor || '—') + '</td>'
                + '</tr>';
        });
        html += '</table>';
        return html;
    }

    /* =========================================================
       Discord webhook
    ========================================================= */
    function buildDiscordEmbed(titulo, campos) {
        return {
            tts: false,
            embeds: [{
                title: titulo,
                color: 14162715,
                thumbnail: { url: 'https://media.discordapp.net/attachments/728648351473729556/1119276184698617896/logohdx.png?width=676&height=676' },
                fields: campos.map(function (c) { return { name: c.nome, value: c.valor || '—' }; })
            }],
            components: []
        };
    }

    async function enviarDiscord(webhookUrl, titulo, campos) {
        try {
            await fetch(webhookUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(buildDiscordEmbed(titulo, campos))
            });
        } catch (err) { console.error('Discord:', err); }
    }

    /* =========================================================
       Popup helpers
    ========================================================= */
    window.openPopup = function (id) {
        document.getElementById(id).style.display = 'block';
    };
    window.closePopup = function (id) {
        document.getElementById(id).style.display = 'none';
    };

    function mostrarPopup(idMsg, idPopup, texto) {
        document.getElementById(idMsg).textContent = texto;
        openPopup(idPopup);
    }

    function validar($form, idMsg, idPopup) {
        if (!$form[0].checkValidity()) {
            mostrarPopup(idMsg, idPopup, 'Preenche todos os campos!');
            $form.addClass('was-validated');
            return false;
        }
        return true;
    }

    /* =========================================================
       CONTACTO / SUPORTE
    ========================================================= */
    function initContactForm() {
        $(document).on('submit', '#form-contact', async function (e) {
            e.preventDefault();
            var $form = $(this);

            var nome     = $('#contact-nome').val().trim();
            var email    = $('#contact-discord').val().trim();
            var mensagem = $('#contact-mensagem').val().trim();

            if (!nome || !email || !mensagem) {
                mostrarPopup('popup-contact-msg', 'popup-contact', 'Preenche todos os campos!');
                return;
            }

            var campos = [
                { nome: 'Nome',     valor: nome },
                { nome: 'Email',    valor: email },
                { nome: 'Mensagem', valor: mensagem }
            ];

            await enviarDiscord(WEBHOOK_SUPPORT, 'Hydrox eSports | Support Website', campos);
            await enviarEmailEquipa('Novo pedido de suporte — ' + nome, camposParaHtml(campos));
            await enviarEmailUser(email,
                'Recebemos a tua mensagem — Hydrox eSports',
                'Olá ' + nome + '! Recebemos a tua mensagem e vamos responder o mais brevemente possível.',
                camposParaHtml(campos)
            );

            mostrarPopup('popup-contact-msg', 'popup-contact', 'Mensagem enviada! Vais receber um email de confirmação.');
            $form[0].reset();
        });
    }

    /* =========================================================
       RESERVA JERSEY
    ========================================================= */
    function initJerseyForm() {
        $(document).on('submit', '#form-jersey', async function (e) {
            e.preventDefault();
            var $form = $(this);
            if (!validar($form, 'popup-jersey-msg', 'popup-jersey')) return;

            var email   = $('#jersey-email').val().trim();
            var quanti  = $('#jersey-quantidade').val();
            var tamanho = $('#jersey-tamanho').val();
            var nome    = $('#jersey-nome').val().trim();
            var morada  = $('#jersey-morada').val().trim();

            var campos = [
                { nome: 'Email',          valor: email },
                { nome: 'Quantidade',     valor: quanti + 'x' },
                { nome: 'Tamanho',        valor: tamanho },
                { nome: 'Nome na Jersey', valor: nome },
                { nome: 'Morada',         valor: morada }
            ];

            await enviarDiscord(WEBHOOK_JERSEY, 'Hydrox eSports | Reserva Jersey', campos);
            await enviarEmailEquipa('Nova reserva Jersey — ' + nome, camposParaHtml(campos));
            await enviarEmailUser(email,
                'Confirmação da tua reserva de Jersey — Hydrox eSports',
                'Olá ' + nome + '! A tua reserva de jersey (tamanho ' + tamanho + ', quantidade ' + quanti + ') foi recebida. Entraremos em contacto para a realização do pagamento.',
                camposParaHtml(campos)
            );

            mostrarPopup('popup-jersey-msg', 'popup-jersey', 'Reserva efectuada! Vais receber um email de confirmação.');
            $form[0].reset();
        });
    }

    /* =========================================================
       MEMBRO PREMIUM
    ========================================================= */
    function initPremiumForm() {
        $(document).on('submit', '#form-premium', async function (e) {
            e.preventDefault();
            var $form = $(this);
            if (!validar($form, 'popup-premium-msg', 'popup-premium')) return;

            var email = $('#premium-email').val().trim();
            var valor = $('#premium-valor').val().trim();

            var campos = [
                { nome: 'Email',       valor: email },
                { nome: 'Valor doado', valor: valor + ' €' }
            ];

            await enviarDiscord(WEBHOOK_SUPPORT, 'Hydrox eSports | Membro Premium', campos);
            await enviarEmailEquipa('Novo Membro Premium — ' + email, camposParaHtml(campos));
            await enviarEmailUser(email,
                'Confirmação — Membro Premium Hydrox eSports',
                'Obrigado pelo teu apoio! Recebemos o teu pedido de Membro Premium (valor proposto: ' + valor + ' €). Vamos enviar as instruções de pagamento em breve. Após confirmação o teu cargo Premium será ativado.',
                camposParaHtml(campos)
            );

            mostrarPopup('popup-premium-msg', 'popup-premium', 'Pedido recebido! Vais receber um email de confirmação.');
            $form[0].reset();
        });
    }

    /* =========================================================
       CANDIDATURA PLAYER
    ========================================================= */
    function initCandidaturaPlayerForm() {
        $(document).on('submit', '#form-cand-player', async function (e) {
            e.preventDefault();
            var $form = $(this);
            if (!validar($form, 'popup-cand-player-msg', 'popup-cand-player')) return;

            var nome      = $('#player-nome').val().trim();
            var email     = $('#player-email').val().trim();
            var jogo      = $('#player-jogo').val();
            var rank      = $('#player-rank').val().trim();
            var motivacao = $('#player-mensagem').val().trim();

            var campos = [
                { nome: 'Nome',      valor: nome },
                { nome: 'Email',     valor: email },
                { nome: 'Jogo',      valor: jogo },
                { nome: 'Rank',      valor: rank },
                { nome: 'Motivação', valor: motivacao },
                { nome: 'IMPORTANTE', valor: 'Rever com o manager e CEO antes de aprovar.' }
            ];

            await enviarDiscord(WEBHOOK_CAND, 'Hydrox eSports | Candidatura Player', campos);
            await enviarEmailEquipa('Nova candidatura Player — ' + nome + ' (' + jogo + ')', camposParaHtml(campos));
            await enviarEmailUser(email,
                'Recebemos a tua candidatura — Hydrox eSports',
                'Olá ' + nome + '! Recebemos a tua candidatura para a equipa de ' + jogo + '. A nossa staff vai analisar o teu perfil e entraremos em contacto em breve. Boa sorte! 🐺',
                camposParaHtml([
                    { nome: 'Nome', valor: nome },
                    { nome: 'Jogo', valor: jogo },
                    { nome: 'Rank', valor: rank }
                ])
            );

            mostrarPopup('popup-cand-player-msg', 'popup-cand-player', 'Candidatura enviada! Vais receber um email de confirmação.');
            $form[0].reset();
        });
    }

    /* =========================================================
       CANDIDATURA STREAMER
    ========================================================= */
    function initCandidaturaStreamerForm() {
        $(document).on('submit', '#form-cand-streamer', async function (e) {
            e.preventDefault();
            var $form = $(this);
            if (!validar($form, 'popup-cand-streamer-msg', 'popup-cand-streamer')) return;

            var nome      = $('#streamer-nome').val().trim();
            var email     = $('#streamer-email').val().trim();
            var viewers   = $('#streamer-viewers').val();
            var jogo      = $('#streamer-jogo').val().trim();
            var freq      = $('#streamer-freq').val().trim();
            var twitch    = $('#streamer-twitch').val().trim();
            var motivacao = $('#streamer-mensagem').val().trim();

            var campos = [
                { nome: 'Nome',           valor: nome },
                { nome: 'Email',          valor: email },
                { nome: 'Canal Twitch',   valor: twitch },
                { nome: 'Média viewers',  valor: viewers },
                { nome: 'Jogo principal', valor: jogo },
                { nome: 'Streams/semana', valor: freq },
                { nome: 'Motivação',      valor: motivacao },
                { nome: 'IMPORTANTE',     valor: 'Rever com o CEO antes de aprovar.' }
            ];

            await enviarDiscord(WEBHOOK_CAND, 'Hydrox eSports | Candidatura Streamer', campos);
            await enviarEmailEquipa('Nova candidatura Streamer — ' + nome + ' (' + twitch + ')', camposParaHtml(campos));
            await enviarEmailUser(email,
                'Recebemos a tua candidatura de Streamer — Hydrox eSports',
                'Olá ' + nome + '! Recebemos a tua candidatura como streamer. A nossa staff vai analisar o teu canal (' + twitch + ') e entraremos em contacto em breve. Boa sorte! 🎮',
                camposParaHtml([
                    { nome: 'Nome',   valor: nome },
                    { nome: 'Twitch', valor: twitch },
                    { nome: 'Jogo',   valor: jogo }
                ])
            );

            mostrarPopup('popup-cand-streamer-msg', 'popup-cand-streamer', 'Candidatura enviada! Vais receber um email de confirmação.');
            $form[0].reset();
        });
    }

    /* =========================================================
       Banner Carousel
    ========================================================= */
    function initBannerCarousel() {
        var track = document.getElementById('carousel-track');
        if (!track) return;
        var index = 0;
        setInterval(function () {
            index = (index + 1) % 3;
            track.style.transform = 'translateX(-' + (index * 33.333) + '%)';
        }, 3000);
    }

    /* =========================================================
       Slick Sliders
    ========================================================= */
    function initSliders() {
        var resp = [
            { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 1 } },
            { breakpoint: 768, settings: { slidesToShow: 2, slidesToScroll: 1 } },
            { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } }
        ];
        $('.streamers-grid').slick({ slidesToShow: 3, slidesToScroll: 2, autoplay: true, dots: false, arrows: false, autoplaySpeed: 2500, responsive: resp });
        $('.partners-track').slick({ slidesToShow: 4, slidesToScroll: 1, autoplay: true, dots: false, arrows: false, autoplaySpeed: 2500, responsive: resp });
        $('.teams-carousel').slick({ slidesToShow: 3, slidesToScroll: 1, autoplay: true, dots: false, arrows: false, autoplaySpeed: 2500, centerMode: true, centerPadding: '0px', focusOnSelect: true, responsive: resp });
        $('.shop-carousel').slick({ slidesToShow: 4, slidesToScroll: 1, autoplay: true, dots: false, arrows: false, autoplaySpeed: 2500, responsive: resp });
        $('.news-carousel').slick({ slidesToShow: 3, slidesToScroll: 1, autoplay: true, dots: false, arrows: true, nextArrow: '.news-arrow .arrow-next', prevArrow: '.news-arrow .arrow-prev', autoplaySpeed: 2500, centerMode: true, centerPadding: '0px', focusOnSelect: true, responsive: resp });
    }

    /* =========================================================
       Resto
    ========================================================= */
    function initPreloader() {
        $(window).on('load', function () { $('.preloader').delay(1000).fadeOut(1000); });
    }

    function initNavScroll() {
        $(window).scroll(function () {
            var s = $(this).scrollTop();
            if (s >= 100) { $('.sticky-top').addClass('nav-scrolled'); } else { $('.sticky-top').removeClass('nav-scrolled'); }
            if (s > 180)  { $('.backtotop').fadeIn(500); }              else { $('.backtotop').fadeOut(500); }
        });
    }

    function initFullscreenMenu() {
        $('.js-open-menu').on('click', function () { $('.fullscreen-menu').slideDown(600); });
        $('.js-close-menu, .menu-link').on('click', function () { $('.fullscreen-menu').slideUp(600); });
    }

    function initSmoothScroll() {
        var $hb = $('html, body');
        $('.navbar a, .backtotop a').on('click', function () {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var $t = $(this.hash);
                $t = $t.length ? $t : $('[name="' + this.hash.slice(1) + '"]');
                if ($t.length) { $hb.animate({ scrollTop: $t.offset().top - 65 }, 1500); return false; }
            }
        });
        $('body').scrollspy({ target: '.navbar', offset: 70 });
    }

    function initSearchOverlay() {
        $('.js-open-search').on('click', function (e) {
            e.preventDefault();
            $('.search-overlay').addClass('open');
            $('.search-overlay input[type="search"]').focus();
        });
        $('.search-overlay, .btn-close-search').on('click keyup', function (e) {
            if (e.target === this || e.target.className === 'btn-close-search' || e.keyCode === 27) {
                $(this).removeClass('open');
            }
        });
    }

    function initCollapsibles() {
        $(document).on('click', '.collapsible-btn', function () {
            this.classList.toggle('active');
            var $c = $(this).next('.collapsible-content');
            $c.css('max-height', ($c.css('max-height') !== '0px' && $c.css('max-height') !== '') ? '0' : $c[0].scrollHeight + 'px');
        });
    }

    function initPlugins() {
        $('.venobox').venobox();
        $('.counter').counterUp();
    }

    /* =========================================================
       Init
    ========================================================= */
    $(document).ready(function () {
        initEmailJS();
        initBannerCarousel();
        initSliders();
        initPreloader();
        initNavScroll();
        initFullscreenMenu();
        initSmoothScroll();
        initSearchOverlay();
        initCollapsibles();
        initContactForm();
        initJerseyForm();
        initPremiumForm();
        initCandidaturaPlayerForm();
        initCandidaturaStreamerForm();
        initPlugins();
    });

}(jQuery));
