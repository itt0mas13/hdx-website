# HDX Website — Reorganização do Código

## O que foi feito

### Estrutura de pastas (nova vs antiga)

```
ANTES (tudo misturado na raiz):
hdxwebsite/
├── index.html
├── sobre nos.html          ← espaços no nome!
├── privacy policy.html     ← espaços no nome!
├── candidaturas.html
├── config2.php             ← nome confuso
├── conta.php
├── login.php
├── signup.php
├── css/
│   ├── style.css           ← CSS principal
│   ├── styles.css          ← CSS duplicado (login popup)
│   └── responsive.css      ← media queries separadas
├── js/
│   └── custom.js
└── discord bot/            ← espaço no nome!

DEPOIS (organizado):
hdx_clean/
├── index.html              ← página principal limpa
├── pages/
│   ├── candidaturas.html
│   ├── equipas.html
│   ├── streamers.html
│   ├── sobre-nos.html      ← sem espaços
│   ├── privacy-policy.html ← sem espaços
│   └── politica-devolucao.html
├── assets/
│   ├── css/
│   │   ├── main.css        ← style.css + responsive.css fundidos
│   │   └── [vendors]       ← bootstrap, slick, etc.
│   ├── js/
│   │   ├── app.js          ← TODO o JS num único ficheiro
│   │   └── [vendors]
│   ├── images/
│   └── fonts/
├── api/
│   ├── login.php
│   ├── signup.php
│   ├── config.php          ← era config2.php
│   └── conta.php
└── discord-bot/            ← sem espaço
```

---

## Problemas corrigidos

### 1. Nomes de ficheiros com espaços
- `sobre nos.html`       → `pages/sobre-nos.html`
- `privacy policy.html`  → `pages/privacy-policy.html`
- `discord bot/`         → `discord-bot/`
- `hdx gif.gif` e outros mantidos por compatibilidade com imagens

### 2. CSS duplicado e desorganizado
- `style.css` + `styles.css` + `responsive.css` fundidos num único `assets/css/main.css`
- Media queries dentro do mesmo ficheiro (não separadas)
- Classes renomeadas de forma clara:
  - `contact-box` → `form-box`
  - `main-btn` → `btn-main`
  - `model-btn` → `btn-modal`
  - `custom-menubar` → `fullscreen-menu`
  - `nav-bg` → `nav-scrolled`
  - `search` → `search-overlay`
  - `responsive-nav` → `nav-icons-mobile`
  - `game-main` → `streamers-grid`
  - `player-main` → `teams-carousel`
  - `product-main` → `shop-carousel`
  - `blog-main` → `news-carousel`
  - `brand-main` → `partners-track`
  - `player-item` → `team-card-wrap`
  - `player-info` → `team-card-label`
  - `player-img` → `team-card-thumb`
  - `player-lightbox` → `team-overlay`
  - `blog-item` → `news-card`
  - `blog-txt` → `news-card-text`
  - `subscribe-btn` → `btn-discord`
  - `footer-menu` → `footer-links`
  - `copy_right` → `copyright`
  - `copy-right-txt` → `copyright-text`
  - `heading` → `section-heading`
  - `counter-item` → `stat-item`
  - `sale` → `badge-stock`
  - `optioncolor` → `option-dark`
  - `lightbox-overlay` → `hover-overlay`
  - Remoção de `heading2` a `heading5` — duplicados desnecessários
  - Remoção de `about-txt2` a `about-txt7` — posicionamento absoluto horrível

### 3. JavaScript espalhado pelos HTMLs
- Havia 5+ blocos `<script>` dentro do `index.html`, incluindo dentro de modais
- Todo o JS foi movido para `assets/js/app.js`:
  - Carousel do banner
  - Todos os sliders Slick
  - Preloader
  - Navbar scroll
  - Menu fullscreen
  - Smooth scroll
  - Search overlay
  - Collapsibles
  - Formulários de contacto, jersey e premium (com Discord webhooks)
  - Popups

### 4. Responsividade
- O `responsive.css` estava separado e redundante (código repetido)
- Agora está integrado no `main.css` na secção `23.0 Responsividade`
- Breakpoints organizados do menor para o maior

### 5. HTML do index.html
- `<style>` removido do topo (era código CSS inline no HTML)
- `<meta viewport>` duplicado removido
- `lang="en"` corrigido para `lang="pt"`
- IDs de modais renomeados: `contact-model-large` → `modal-contact`, etc.
- IDs de inputs com nomes únicos e descritivos (evita conflito entre modais)
- `style="..."` inline removidos (substituídos por classes)
- Caminhos de imagens actualizados: `images/` → `assets/images/`
- Caminhos de CSS/JS actualizados: `css/` → `assets/css/`

---

## Como actualizar as outras páginas

Para as páginas em `pages/`, muda os caminhos assim:

```html
<!-- CSS (nível pages/) -->
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/main.css">

<!-- Links no menu -->
<a href="../index.html">Home</a>
<a href="../pages/equipas.html">Equipas</a>

<!-- Imagens -->
<img src="../assets/images/logohdx.png">

<!-- JS -->
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/app.js"></script>
```

---

## Próximos passos recomendados

1. Aplicar as mesmas mudanças às páginas restantes (`candidaturas.html`, `equipas.html`, etc.)
2. Mover o CSS inline do modal de jersey (posicionamentos absolutos) para classes no `main.css`
3. Adicionar o atributo `alt` em todas as imagens que ainda não têm
4. Trocar o jQuery 3.3.1 por uma versão mais recente (3.7+)
5. Considerar usar CSS Grid no layout das equipas em vez de Slick
