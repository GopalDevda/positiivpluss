<!DOCTYPE html>
<html lang="en-US">

<head>
   <meta charset="UTF-8">
   <title>Features &#8211; PositiivPlus</title>
   <meta name='robots' content='max-image-preview:large' />
   <link rel='dns-prefetch' href='//fonts.googleapis.com' />
   <link rel="alternate" type="application/rss+xml" title="PositiivPlus &raquo; Feed" href="https://positiivplus.com/wordpress/feed/" />
   <link rel="alternate" type="application/rss+xml" title="PositiivPlus &raquo; Comments Feed" href="https://positiivplus.com/wordpress/comments/feed/" />

   <script>
      window._wpemojiSettings = {
         "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
         "ext": ".png",
         "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
         "svgExt": ".svg",
         "source": {
            "concatemoji": "https:\/\/positiivplus.com\/wordpress\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.3.1"
         }
      };
      /*! This file is auto-generated */
      ! function(i, n) {
         var o, s, e;

         function c(e) {
            try {
               var t = {
                  supportTests: e,
                  timestamp: (new Date).valueOf()
               };
               sessionStorage.setItem(o, JSON.stringify(t))
            } catch (e) {}
         }

         function p(e, t, n) {
            e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
            var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
               r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
            return t.every(function(e, t) {
               return e === r[t]
            })
         }

         function u(e, t, n) {
            switch (t) {
               case "flag":
                  return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
               case "emoji":
                  return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")
            }
            return !1
         }

         function f(e, t, n) {
            var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"),
               a = r.getContext("2d", {
                  willReadFrequently: !0
               }),
               o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
            return e.forEach(function(e) {
               o[e] = t(a, e, n)
            }), o
         }

         function t(e) {
            var t = i.createElement("script");
            t.src = e, t.defer = !0, i.head.appendChild(t)
         }
         "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
            everything: !0,
            everythingExceptFlag: !0
         }, e = new Promise(function(e) {
            i.addEventListener("DOMContentLoaded", e, {
               once: !0
            })
         }), new Promise(function(t) {
            var n = function() {
               try {
                  var e = JSON.parse(sessionStorage.getItem(o));
                  if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
               } catch (e) {}
               return null
            }();
            if (!n) {
               if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                  var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));",
                     r = new Blob([e], {
                        type: "text/javascript"
                     }),
                     a = new Worker(URL.createObjectURL(r), {
                        name: "wpTestEmojiSupports"
                     });
                  return void(a.onmessage = function(e) {
                     c(n = e.data), a.terminate(), t(n)
                  })
               } catch (e) {}
               c(n = f(s, u, p))
            }
            t(n)
         }).then(function(e) {
            for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
            n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
               n.DOMReady = !0
            }
         }).then(function() {
            return e
         }).then(function() {
            var e;
            n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
         }))
      }((window, document), window._wpemojiSettings);
   </script>

   <!-- Jquery CDN -->
   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="company.js"></script>
   <style>
      .form-error {
         font-size: 12px;
         color: red;
      }

      img.wp-smiley,
      img.emoji {
         display: inline !important;
         border: none !important;
         box-shadow: none !important;
         height: 1em !important;
         width: 1em !important;
         margin: 0 0.07em !important;
         vertical-align: -0.1em !important;
         background: none !important;
         padding: 0 !important;
      }
   </style>
   <link rel='stylesheet' id='astra-theme-css-css' href='./css/astra-assets-css-minified-frontend.min.css' media='all' />
   <style id='astra-theme-css-inline-css'>
      .ast-no-sidebar .entry-content .alignfull {
         margin-left: calc(-50vw + 50%);
         margin-right: calc(-50vw + 50%);
         max-width: 100vw;
         width: 100vw;
      }

      .ast-no-sidebar .entry-content .alignwide {
         margin-left: calc(-41vw + 50%);
         margin-right: calc(-41vw + 50%);
         max-width: unset;
         width: unset;
      }

      .ast-no-sidebar .entry-content .alignfull .alignfull,
      .ast-no-sidebar .entry-content .alignfull .alignwide,
      .ast-no-sidebar .entry-content .alignwide .alignfull,
      .ast-no-sidebar .entry-content .alignwide .alignwide,
      .ast-no-sidebar .entry-content .wp-block-column .alignfull,
      .ast-no-sidebar .entry-content .wp-block-column .alignwide {
         width: 100%;
         margin-left: auto;
         margin-right: auto;
      }

      .wp-block-gallery,
      .blocks-gallery-grid {
         margin: 0;
      }

      .wp-block-separator {
         max-width: 100px;
      }

      .wp-block-separator.is-style-wide,
      .wp-block-separator.is-style-dots {
         max-width: none;
      }

      .entry-content .has-2-columns .wp-block-column:first-child {
         padding-right: 10px;
      }

      .entry-content .has-2-columns .wp-block-column:last-child {
         padding-left: 10px;
      }

      @media (max-width: 782px) {
         .entry-content .wp-block-columns .wp-block-column {
            flex-basis: 100%;
         }

         .entry-content .has-2-columns .wp-block-column:first-child {
            padding-right: 0;
         }

         .entry-content .has-2-columns .wp-block-column:last-child {
            padding-left: 0;
         }
      }

      body .entry-content .wp-block-latest-posts {
         margin-left: 0;
      }

      body .entry-content .wp-block-latest-posts li {
         list-style: none;
      }

      .ast-no-sidebar .ast-container .entry-content .wp-block-latest-posts {
         margin-left: 0;
      }

      .ast-header-break-point .entry-content .alignwide {
         margin-left: auto;
         margin-right: auto;
      }

      .entry-content .blocks-gallery-item img {
         margin-bottom: auto;
      }

      .wp-block-pullquote {
         border-top: 4px solid #555d66;
         border-bottom: 4px solid #555d66;
         color: #40464d;
      }

      :root {
         --ast-container-default-xlg-padding: 6.67em;
         --ast-container-default-lg-padding: 5.67em;
         --ast-container-default-slg-padding: 4.34em;
         --ast-container-default-md-padding: 3.34em;
         --ast-container-default-sm-padding: 6.67em;
         --ast-container-default-xs-padding: 2.4em;
         --ast-container-default-xxs-padding: 1.4em;
         --ast-code-block-background: #EEEEEE;
         --ast-comment-inputs-background: #FAFAFA;
      }

      html {
         font-size: 100%;
      }

      a,
      .page-title {
         color: var(--ast-global-color-0);
      }

      a:hover,
      a:focus {
         color: var(--ast-global-color-1);
      }

      body,
      button,
      input,
      select,
      textarea,
      .ast-button,
      .ast-custom-button {
         font-family: 'Noto Sans', sans-serif;
         font-weight: 400;
         font-size: 16px;
         font-size: 1rem;
         line-height: 1.7em;
      }

      blockquote {
         color: var(--ast-global-color-3);
      }

      h1,
      .entry-content h1,
      h2,
      .entry-content h2,
      h3,
      .entry-content h3,
      h4,
      .entry-content h4,
      h5,
      .entry-content h5,
      h6,
      .entry-content h6,
      .site-title,
      .site-title a {
         font-family: 'Montserrat', sans-serif;
         font-weight: 700;
      }

      .site-title {
         font-size: 22px;
         font-size: 1.375rem;
         display: none;
      }

      header .custom-logo-link img {
         max-width: 120px;
      }

      .astra-logo-svg {
         width: 120px;
      }

      .site-header .site-description {
         font-size: 15px;
         font-size: 0.9375rem;
         display: none;
      }

      .entry-title {
         font-size: 30px;
         font-size: 1.875rem;
      }

      h1,
      .entry-content h1 {
         font-size: 64px;
         font-size: 4rem;
         font-family: 'Montserrat', sans-serif;
         text-transform: uppercase;
      }

      h2,
      .entry-content h2 {
         font-size: 34px;
         font-size: 2.125rem;
         font-family: 'Montserrat', sans-serif;
         line-height: 1.4em;
         text-transform: uppercase;
      }

      h3,
      .entry-content h3 {
         font-size: 24px;
         font-size: 1.5rem;
         font-family: 'Montserrat', sans-serif;
      }

      h4,
      .entry-content h4 {
         font-size: 20px;
         font-size: 1.25rem;
         font-family: 'Montserrat', sans-serif;
      }

      h5,
      .entry-content h5 {
         font-size: 18px;
         font-size: 1.125rem;
         font-family: 'Montserrat', sans-serif;
      }

      h6,
      .entry-content h6 {
         font-size: 15px;
         font-size: 0.9375rem;
         font-family: 'Montserrat', sans-serif;
      }

      ::selection {
         background-color: var(--ast-global-color-0);
         color: #ffffff;
      }

      body,
      h1,
      .entry-title a,
      .entry-content h1,
      h2,
      .entry-content h2,
      h3,
      .entry-content h3,
      h4,
      .entry-content h4,
      h5,
      .entry-content h5,
      h6,
      .entry-content h6 {
         color: var(--ast-global-color-3);
      }

      .tagcloud a:hover,
      .tagcloud a:focus,
      .tagcloud a.current-item {
         color: #ffffff;
         border-color: var(--ast-global-color-0);
         background-color: var(--ast-global-color-0);
      }

      input:focus,
      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="url"]:focus,
      input[type="password"]:focus,
      input[type="reset"]:focus,
      input[type="search"]:focus,
      textarea:focus {
         border-color: var(--ast-global-color-0);
      }

      input[type="radio"]:checked,
      input[type=reset],
      input[type="checkbox"]:checked,
      input[type="checkbox"]:hover:checked,
      input[type="checkbox"]:focus:checked,
      input[type=range]::-webkit-slider-thumb {
         border-color: var(--ast-global-color-0);
         background-color: var(--ast-global-color-0);
         box-shadow: none;
      }

      .site-footer a:hover+.post-count,
      .site-footer a:focus+.post-count {
         background: var(--ast-global-color-0);
         border-color: var(--ast-global-color-0);
      }

      .single .nav-links .nav-previous,
      .single .nav-links .nav-next {
         color: var(--ast-global-color-0);
      }

      .entry-meta,
      .entry-meta * {
         line-height: 1.45;
         color: var(--ast-global-color-0);
      }

      .entry-meta a:hover,
      .entry-meta a:hover *,
      .entry-meta a:focus,
      .entry-meta a:focus *,
      .page-links>.page-link,
      .page-links .page-link:hover,
      .post-navigation a:hover {
         color: var(--ast-global-color-1);
      }

      #cat option,
      .secondary .calendar_wrap thead a,
      .secondary .calendar_wrap thead a:visited {
         color: var(--ast-global-color-0);
      }

      .secondary .calendar_wrap #today,
      .ast-progress-val span {
         background: var(--ast-global-color-0);
      }

      .secondary a:hover+.post-count,
      .secondary a:focus+.post-count {
         background: var(--ast-global-color-0);
         border-color: var(--ast-global-color-0);
      }

      .calendar_wrap #today>a {
         color: #ffffff;
      }

      .page-links .page-link,
      .single .post-navigation a {
         color: var(--ast-global-color-0);
      }

      .widget-title {
         font-size: 22px;
         font-size: 1.375rem;
         color: var(--ast-global-color-3);
      }

      a:focus-visible,
      .ast-menu-toggle:focus-visible,
      .site .skip-link:focus-visible,
      .wp-block-loginout input:focus-visible,
      .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,
      .ast-header-navigation-arrow:focus-visible {
         outline-style: dotted;
         outline-color: inherit;
         outline-width: thin;
         border-color: transparent;
      }

      input:focus,
      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="url"]:focus,
      input[type="password"]:focus,
      input[type="reset"]:focus,
      input[type="search"]:focus,
      textarea:focus,
      .wp-block-search__input:focus,
      [data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal:focus,
      .ast-mobile-popup-drawer.active .menu-toggle-close:focus,
      .woocommerce-ordering select.orderby:focus,
      #ast-scroll-top:focus,
      .woocommerce a.add_to_cart_button:focus,
      .woocommerce .button.single_add_to_cart_button:focus {
         border-style: dotted;
         border-color: inherit;
         border-width: thin;
         outline-color: transparent;
      }

      .site-logo-img img {
         transition: all 0.2s linear;
      }

      @media (max-width:921px) {
         #ast-desktop-header {
            display: none;
         }
      }

      @media (min-width:921px) {
         #ast-mobile-header {
            display: none;
         }
      }

      .wp-block-buttons.aligncenter {
         justify-content: center;
      }

      @media (max-width:782px) {
         .entry-content .wp-block-columns .wp-block-column {
            margin-left: 0px;
         }
      }

      .wp-block-image.aligncenter {
         margin-left: auto;
         margin-right: auto;
      }

      .wp-block-table.aligncenter {
         margin-left: auto;
         margin-right: auto;
      }

      @media (max-width:921px) {

         .ast-separate-container #primary,
         .ast-separate-container #secondary {
            padding: 1.5em 0;
         }

         #primary,
         #secondary {
            padding: 1.5em 0;
            margin: 0;
         }

         .ast-left-sidebar #content>.ast-container {
            display: flex;
            flex-direction: column-reverse;
            width: 100%;
         }

         .ast-separate-container .ast-article-post,
         .ast-separate-container .ast-article-single {
            padding: 1.5em 2.14em;
         }

         .ast-author-box img.avatar {
            margin: 20px 0 0 0;
         }
      }

      @media (min-width:922px) {

         .ast-separate-container.ast-right-sidebar #primary,
         .ast-separate-container.ast-left-sidebar #primary {
            border: 0;
         }

         .search-no-results.ast-separate-container #primary {
            margin-bottom: 4em;
         }
      }

      .elementor-button-wrapper .elementor-button {
         border-style: solid;
         text-decoration: none;
         border-top-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-bottom-width: 0;
      }

      body .elementor-button.elementor-size-sm,
      body .elementor-button.elementor-size-xs,
      body .elementor-button.elementor-size-md,
      body .elementor-button.elementor-size-lg,
      body .elementor-button.elementor-size-xl,
      body .elementor-button {
         border-top-left-radius: 30px;
         border-top-right-radius: 30px;
         border-bottom-right-radius: 30px;
         border-bottom-left-radius: 30px;
         padding-top: 17px;
         padding-right: 40px;
         padding-bottom: 17px;
         padding-left: 40px;
      }

      .elementor-button-wrapper .elementor-button {
         border-color: var(--ast-global-color-0);
         background-color: var(--ast-global-color-0);
      }

      .elementor-button-wrapper .elementor-button:hover,
      .elementor-button-wrapper .elementor-button:focus {
         color: #ffffff;
         background-color: var(--ast-global-color-1);
         border-color: var(--ast-global-color-1);
      }

      .wp-block-button .wp-block-button__link,
      .elementor-button-wrapper .elementor-button,
      .elementor-button-wrapper .elementor-button:visited {
         color: #ffffff;
      }

      .elementor-button-wrapper .elementor-button {
         font-weight: 700;
         font-size: 14px;
         font-size: 0.875rem;
         line-height: 1em;
         text-transform: uppercase;
      }

      body .elementor-button.elementor-size-sm,
      body .elementor-button.elementor-size-xs,
      body .elementor-button.elementor-size-md,
      body .elementor-button.elementor-size-lg,
      body .elementor-button.elementor-size-xl,
      body .elementor-button {
         font-size: 14px;
         font-size: 0.875rem;
      }

      .wp-block-button .wp-block-button__link:hover,
      .wp-block-button .wp-block-button__link:focus {
         color: #ffffff;
         background-color: var(--ast-global-color-1);
         border-color: var(--ast-global-color-1);
      }

      .elementor-widget-heading h2.elementor-heading-title {
         line-height: 1.4em;
      }

      .wp-block-button .wp-block-button__link {
         border-top-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-bottom-width: 0;
         border-color: var(--ast-global-color-0);
         background-color: var(--ast-global-color-0);
         color: #ffffff;
         font-family: inherit;
         font-weight: 700;
         line-height: 1em;
         text-transform: uppercase;
         font-size: 14px;
         font-size: 0.875rem;
         border-top-left-radius: 30px;
         border-top-right-radius: 30px;
         border-bottom-right-radius: 30px;
         border-bottom-left-radius: 30px;
         padding-top: 17px;
         padding-right: 40px;
         padding-bottom: 17px;
         padding-left: 40px;
      }

      .menu-toggle,
      button,
      .ast-button,
      .ast-custom-button,
      .button,
      input#submit,
      input[type="button"],
      input[type="submit"],
      input[type="reset"] {
         border-style: solid;
         border-top-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-bottom-width: 0;
         color: #ffffff;
         border-color: var(--ast-global-color-0);
         background-color: var(--ast-global-color-0);
         padding-top: 17px;
         padding-right: 40px;
         padding-bottom: 17px;
         padding-left: 40px;
         font-family: inherit;
         font-weight: 700;
         font-size: 14px;
         font-size: 0.875rem;
         line-height: 1em;
         text-transform: uppercase;
         border-top-left-radius: 30px;
         border-top-right-radius: 30px;
         border-bottom-right-radius: 30px;
         border-bottom-left-radius: 30px;
      }

      button:focus,
      .menu-toggle:hover,
      button:hover,
      .ast-button:hover,
      .ast-custom-button:hover .button:hover,
      .ast-custom-button:hover,
      input[type=reset]:hover,
      input[type=reset]:focus,
      input#submit:hover,
      input#submit:focus,
      input[type="button"]:hover,
      input[type="button"]:focus,
      input[type="submit"]:hover,
      input[type="submit"]:focus {
         color: #ffffff;
         background-color: var(--ast-global-color-1);
         border-color: var(--ast-global-color-1);
      }

      @media (max-width:921px) {
         .ast-mobile-header-stack .main-header-bar .ast-search-menu-icon {
            display: inline-block;
         }

         .ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon {
            margin: 0;
         }

         .ast-comment-avatar-wrap img {
            max-width: 2.5em;
         }

         .ast-separate-container .ast-comment-list li.depth-1 {
            padding: 1.5em 2.14em;
         }

         .ast-separate-container .comment-respond {
            padding: 2em 2.14em;
         }

         .ast-comment-meta {
            padding: 0 1.8888em 1.3333em;
         }
      }

      @media (min-width:544px) {
         .ast-container {
            max-width: 100%;
         }
      }

      @media (max-width:544px) {

         .ast-separate-container .ast-article-post,
         .ast-separate-container .ast-article-single,
         .ast-separate-container .comments-title,
         .ast-separate-container .ast-archive-description {
            padding: 1.5em 1em;
         }

         .ast-separate-container #content .ast-container {
            padding-left: 0.54em;
            padding-right: 0.54em;
         }

         .ast-separate-container .ast-comment-list li.depth-1 {
            padding: 1.5em 1em;
            margin-bottom: 1.5em;
         }

         .ast-separate-container .ast-comment-list .bypostauthor {
            padding: .5em;
         }

         .ast-search-menu-icon.ast-dropdown-active .search-field {
            width: 170px;
         }
      }

      body,
      .ast-separate-container {
         background-color: var(--ast-global-color-4);
         ;
         background-image: none;
         ;
      }

      .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
         margin-left: -6.67em;
         margin-right: -6.67em;
         width: auto;
      }

      @media (max-width: 1200px) {
         .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
            margin-left: -2.4em;
            margin-right: -2.4em;
         }
      }

      @media (max-width: 768px) {
         .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
            margin-left: -2.14em;
            margin-right: -2.14em;
         }
      }

      @media (max-width: 544px) {
         .ast-no-sidebar.ast-separate-container .entry-content .alignfull {
            margin-left: -1em;
            margin-right: -1em;
         }
      }

      .ast-no-sidebar.ast-separate-container .entry-content .alignwide {
         margin-left: -20px;
         margin-right: -20px;
      }

      .ast-no-sidebar.ast-separate-container .entry-content .wp-block-column .alignfull,
      .ast-no-sidebar.ast-separate-container .entry-content .wp-block-column .alignwide {
         margin-left: auto;
         margin-right: auto;
         width: 100%;
      }

      @media (max-width:921px) {
         .site-title {
            display: none;
         }

         .site-header .site-description {
            display: none;
         }

         .entry-title {
            font-size: 30px;
         }

         h1,
         .entry-content h1 {
            font-size: 44px;
         }

         h2,
         .entry-content h2 {
            font-size: 32px;
         }

         h3,
         .entry-content h3 {
            font-size: 20px;
         }
      }

      @media (max-width:544px) {
         .widget-title {
            font-size: 21px;
            font-size: 1.4rem;
         }

         body,
         button,
         input,
         select,
         textarea,
         .ast-button,
         .ast-custom-button {
            font-size: 15px;
            font-size: 0.9375rem;
         }

         #secondary,
         #secondary button,
         #secondary input,
         #secondary select,
         #secondary textarea {
            font-size: 15px;
            font-size: 0.9375rem;
         }

         .site-title {
            font-size: 20px;
            font-size: 1.25rem;
            display: none;
         }

         .site-header .site-description {
            font-size: 14px;
            font-size: 0.875rem;
            display: none;
         }

         .entry-title {
            font-size: 30px;
         }

         h1,
         .entry-content h1 {
            font-size: 30px;
         }

         h2,
         .entry-content h2 {
            font-size: 24px;
         }

         h3,
         .entry-content h3 {
            font-size: 20px;
         }

         h4,
         .entry-content h4 {
            font-size: 19px;
            font-size: 1.1875rem;
         }

         h5,
         .entry-content h5 {
            font-size: 16px;
            font-size: 1rem;
         }

         h6,
         .entry-content h6 {
            font-size: 15px;
            font-size: 0.9375rem;
         }

         header .custom-logo-link img,
         .ast-header-break-point .site-branding img,
         .ast-header-break-point .custom-logo-link img {
            max-width: 100px;
         }

         .astra-logo-svg {
            width: 100px;
         }

         .ast-header-break-point .site-logo-img .custom-mobile-logo-link img {
            max-width: 100px;
         }
      }

      @media (max-width:921px) {
         html {
            font-size: 91.2%;
         }
      }

      @media (max-width:544px) {
         html {
            font-size: 100%;
         }
      }

      @media (min-width:922px) {
         .ast-container {
            max-width: 1240px;
         }
      }

      @font-face {
         font-family: "Astra";
         src: url(./fonts/astra.woff) format("woff"), url(./fonts/astra.ttf) format("truetype"), url(https://positiivplus.com/wordpress/wp-content/themes/astra/assets/fonts/astra.svg#astra) format("svg");
         font-weight: normal;
         font-style: normal;
         font-display: fallback;
      }

      @media (min-width:922px) {

         .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover>.sub-menu,
         .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus>.sub-menu {
            margin-left: -0px;
         }
      }

      .astra-icon-down_arrow::after {
         content: "\e900";
         font-family: Astra;
      }

      .astra-icon-close::after {
         content: "\e5cd";
         font-family: Astra;
      }

      .astra-icon-drag_handle::after {
         content: "\e25d";
         font-family: Astra;
      }

      .astra-icon-format_align_justify::after {
         content: "\e235";
         font-family: Astra;
      }

      .astra-icon-menu::after {
         content: "\e5d2";
         font-family: Astra;
      }

      .astra-icon-reorder::after {
         content: "\e8fe";
         font-family: Astra;
      }

      .astra-icon-search::after {
         content: "\e8b6";
         font-family: Astra;
      }

      .astra-icon-zoom_in::after {
         content: "\e56b";
         font-family: Astra;
      }

      .astra-icon-check-circle::after {
         content: "\e901";
         font-family: Astra;
      }

      .astra-icon-shopping-cart::after {
         content: "\f07a";
         font-family: Astra;
      }

      .astra-icon-shopping-bag::after {
         content: "\f290";
         font-family: Astra;
      }

      .astra-icon-shopping-basket::after {
         content: "\f291";
         font-family: Astra;
      }

      .astra-icon-circle-o::after {
         content: "\e903";
         font-family: Astra;
      }

      .astra-icon-certificate::after {
         content: "\e902";
         font-family: Astra;
      }

      blockquote {
         padding: 1.2em;
      }

      :root .has-ast-global-color-0-color {
         color: var(--ast-global-color-0);
      }

      :root .has-ast-global-color-0-background-color {
         background-color: var(--ast-global-color-0);
      }

      :root .wp-block-button .has-ast-global-color-0-color {
         color: var(--ast-global-color-0);
      }

      :root .wp-block-button .has-ast-global-color-0-background-color {
         background-color: var(--ast-global-color-0);
      }

      :root .has-ast-global-color-1-color {
         color: var(--ast-global-color-1);
      }

      :root .has-ast-global-color-1-background-color {
         background-color: var(--ast-global-color-1);
      }

      :root .wp-block-button .has-ast-global-color-1-color {
         color: var(--ast-global-color-1);
      }

      :root .wp-block-button .has-ast-global-color-1-background-color {
         background-color: var(--ast-global-color-1);
      }

      :root .has-ast-global-color-2-color {
         color: var(--ast-global-color-2);
      }

      :root .has-ast-global-color-2-background-color {
         background-color: var(--ast-global-color-2);
      }

      :root .wp-block-button .has-ast-global-color-2-color {
         color: var(--ast-global-color-2);
      }

      :root .wp-block-button .has-ast-global-color-2-background-color {
         background-color: var(--ast-global-color-2);
      }

      :root .has-ast-global-color-3-color {
         color: var(--ast-global-color-3);
      }

      :root .has-ast-global-color-3-background-color {
         background-color: var(--ast-global-color-3);
      }

      :root .wp-block-button .has-ast-global-color-3-color {
         color: var(--ast-global-color-3);
      }

      :root .wp-block-button .has-ast-global-color-3-background-color {
         background-color: var(--ast-global-color-3);
      }

      :root .has-ast-global-color-4-color {
         color: var(--ast-global-color-4);
      }

      :root .has-ast-global-color-4-background-color {
         background-color: var(--ast-global-color-4);
      }

      :root .wp-block-button .has-ast-global-color-4-color {
         color: var(--ast-global-color-4);
      }

      :root .wp-block-button .has-ast-global-color-4-background-color {
         background-color: var(--ast-global-color-4);
      }

      :root .has-ast-global-color-5-color {
         color: var(--ast-global-color-5);
      }

      :root .has-ast-global-color-5-background-color {
         background-color: var(--ast-global-color-5);
      }

      :root .wp-block-button .has-ast-global-color-5-color {
         color: var(--ast-global-color-5);
      }

      :root .wp-block-button .has-ast-global-color-5-background-color {
         background-color: var(--ast-global-color-5);
      }

      :root .has-ast-global-color-6-color {
         color: var(--ast-global-color-6);
      }

      :root .has-ast-global-color-6-background-color {
         background-color: var(--ast-global-color-6);
      }

      :root .wp-block-button .has-ast-global-color-6-color {
         color: var(--ast-global-color-6);
      }

      :root .wp-block-button .has-ast-global-color-6-background-color {
         background-color: var(--ast-global-color-6);
      }

      :root .has-ast-global-color-7-color {
         color: var(--ast-global-color-7);
      }

      :root .has-ast-global-color-7-background-color {
         background-color: var(--ast-global-color-7);
      }

      :root .wp-block-button .has-ast-global-color-7-color {
         color: var(--ast-global-color-7);
      }

      :root .wp-block-button .has-ast-global-color-7-background-color {
         background-color: var(--ast-global-color-7);
      }

      :root .has-ast-global-color-8-color {
         color: var(--ast-global-color-8);
      }

      :root .has-ast-global-color-8-background-color {
         background-color: var(--ast-global-color-8);
      }

      :root .wp-block-button .has-ast-global-color-8-color {
         color: var(--ast-global-color-8);
      }

      :root .wp-block-button .has-ast-global-color-8-background-color {
         background-color: var(--ast-global-color-8);
      }

      :root {
         --ast-global-color-0: #fb2056;
         --ast-global-color-1: #da1c4b;
         --ast-global-color-2: #191919;
         --ast-global-color-3: #404040;
         --ast-global-color-4: #f5f5f5;
         --ast-global-color-5: #ffffff;
         --ast-global-color-6: #ececec;
         --ast-global-color-7: #313131;
         --ast-global-color-8: #000000;
      }

      :root {
         --ast-border-color: #dddddd;
      }

      .ast-single-entry-banner {
         -js-display: flex;
         display: flex;
         flex-direction: column;
         justify-content: center;
         text-align: center;
         position: relative;
         background: #eeeeee;
      }

      .ast-single-entry-banner[data-banner-layout="layout-1"] {
         max-width: 1200px;
         background: inherit;
         padding: 20px 0;
      }

      .ast-single-entry-banner[data-banner-width-type="custom"] {
         margin: 0 auto;
         width: 100%;
      }

      .ast-single-entry-banner+.site-content .entry-header {
         margin-bottom: 0;
      }

      header.entry-header .entry-title {
         font-size: 30px;
         font-size: 1.875rem;
      }

      header.entry-header>*:not(:last-child) {
         margin-bottom: 10px;
      }

      .ast-archive-entry-banner {
         -js-display: flex;
         display: flex;
         flex-direction: column;
         justify-content: center;
         text-align: center;
         position: relative;
         background: #eeeeee;
      }

      .ast-archive-entry-banner[data-banner-width-type="custom"] {
         margin: 0 auto;
         width: 100%;
      }

      .ast-archive-entry-banner[data-banner-layout="layout-1"] {
         background: inherit;
         padding: 20px 0;
         text-align: left;
      }

      body.archive .ast-archive-description {
         max-width: 1200px;
         width: 100%;
         text-align: left;
         padding-top: 3em;
         padding-right: 3em;
         padding-bottom: 3em;
         padding-left: 3em;
      }

      body.archive .ast-archive-description .ast-archive-title,
      body.archive .ast-archive-description .ast-archive-title * {
         font-size: 40px;
         font-size: 2.5rem;
      }

      body.archive .ast-archive-description>*:not(:last-child) {
         margin-bottom: 10px;
      }

      @media (max-width:921px) {
         body.archive .ast-archive-description {
            text-align: left;
         }
      }

      @media (max-width:544px) {
         body.archive .ast-archive-description {
            text-align: left;
         }
      }

      .ast-breadcrumbs .trail-browse,
      .ast-breadcrumbs .trail-items,
      .ast-breadcrumbs .trail-items li {
         display: inline-block;
         margin: 0;
         padding: 0;
         border: none;
         background: inherit;
         text-indent: 0;
         text-decoration: none;
      }

      .ast-breadcrumbs .trail-browse {
         font-size: inherit;
         font-style: inherit;
         font-weight: inherit;
         color: inherit;
      }

      .ast-breadcrumbs .trail-items {
         list-style: none;
      }

      .trail-items li::after {
         padding: 0 0.3em;
         content: "\00bb";
      }

      .trail-items li:last-of-type::after {
         display: none;
      }

      h1,
      .entry-content h1,
      h2,
      .entry-content h2,
      h3,
      .entry-content h3,
      h4,
      .entry-content h4,
      h5,
      .entry-content h5,
      h6,
      .entry-content h6 {
         color: var(--ast-global-color-2);
      }

      @media (max-width:921px) {

         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row>*:first-child,
         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row>*:last-child {
            grid-column: 1 / -1;
         }
      }

      @media (max-width:544px) {

         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row>*:first-child,
         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row>*:last-child {
            grid-column: 1 / -1;
         }
      }

      .ast-builder-layout-element[data-section="title_tagline"] {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"] {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"] {
            display: flex;
         }
      }

      [data-section*="section-hb-button-"] .menu-link {
         display: none;
      }

      .ast-header-button-1[data-section*="section-hb-button-"] .ast-builder-button-wrap .ast-custom-button {
         font-size: 14px;
         font-size: 0.875rem;
      }

      .ast-header-button-1[data-section*="section-hb-button-"] .ast-builder-button-wrap .ast-custom-button {
         padding-top: 16px;
         padding-bottom: 16px;
         padding-left: 40px;
         padding-right: 40px;
      }

      .ast-header-button-1[data-section="section-hb-button-1"] {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-header-button-1[data-section="section-hb-button-1"] {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-header-button-1[data-section="section-hb-button-1"] {
            display: flex;
         }
      }

      .ast-builder-menu-1 {
         font-family: inherit;
         font-weight: inherit;
      }

      .ast-builder-menu-1 .menu-item>.menu-link {
         color: var(--ast-global-color-8);
      }

      .ast-builder-menu-1 .menu-item>.ast-menu-toggle {
         color: var(--ast-global-color-8);
      }

      .ast-builder-menu-1 .menu-item:hover>.menu-link,
      .ast-builder-menu-1 .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
         color: var(--ast-global-color-0);
      }

      .ast-builder-menu-1 .menu-item:hover>.ast-menu-toggle {
         color: var(--ast-global-color-0);
      }

      .ast-builder-menu-1 .menu-item.current-menu-item>.menu-link,
      .ast-builder-menu-1 .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
      .ast-builder-menu-1 .current-menu-ancestor>.menu-link {
         color: var(--ast-global-color-0);
      }

      .ast-builder-menu-1 .menu-item.current-menu-item>.ast-menu-toggle {
         color: var(--ast-global-color-0);
      }

      .ast-builder-menu-1 .sub-menu,
      .ast-builder-menu-1 .inline-on-mobile .sub-menu {
         border-top-width: 2px;
         border-bottom-width: 0;
         border-right-width: 0;
         border-left-width: 0;
         border-color: var(--ast-global-color-0);
         border-style: solid;
      }

      .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
      .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
         margin-top: 0;
      }

      .ast-desktop .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu:before,
      .ast-desktop .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper:before {
         height: calc(0px + 5px);
      }

      .ast-desktop .ast-builder-menu-1 .menu-item .sub-menu .menu-link {
         border-style: none;
      }

      @media (max-width:921px) {
         .ast-builder-menu-1 .main-header-menu .menu-item>.menu-link {
            color: var(--ast-global-color-3);
         }

         .ast-builder-menu-1 .menu-item>.ast-menu-toggle {
            color: var(--ast-global-color-3);
         }

         .ast-builder-menu-1 .menu-item:hover>.menu-link,
         .ast-builder-menu-1 .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-builder-menu-1 .menu-item:hover>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-builder-menu-1 .menu-item.current-menu-item>.menu-link,
         .ast-builder-menu-1 .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
         .ast-builder-menu-1 .current-menu-ancestor>.menu-link,
         .ast-builder-menu-1 .current-menu-ancestor>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-builder-menu-1 .menu-item.current-menu-item>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
         }

         .ast-builder-menu-1 .inline-on-mobile .menu-item.menu-item-has-children>.ast-menu-toggle {
            right: -15px;
         }

         .ast-builder-menu-1 .menu-item-has-children>.menu-link:after {
            content: unset;
         }

         .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
         .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
            margin-top: 0;
         }

         .ast-builder-menu-1 .main-header-menu,
         .ast-builder-menu-1 .main-header-menu .sub-menu {
            background-color: var(--ast-global-color-5);
            ;
            background-image: none;
            ;
         }
      }

      @media (max-width:544px) {
         .ast-builder-menu-1 .main-header-menu .menu-item>.menu-link {
            color: var(--ast-global-color-3);
         }

         .ast-builder-menu-1 .menu-item>.ast-menu-toggle {
            color: var(--ast-global-color-3);
         }

         .ast-builder-menu-1 .menu-item:hover>.menu-link,
         .ast-builder-menu-1 .inline-on-mobile .menu-item:hover>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-builder-menu-1 .menu-item:hover>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-builder-menu-1 .menu-item.current-menu-item>.menu-link,
         .ast-builder-menu-1 .inline-on-mobile .menu-item.current-menu-item>.ast-menu-toggle,
         .ast-builder-menu-1 .current-menu-ancestor>.menu-link,
         .ast-builder-menu-1 .current-menu-ancestor>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-builder-menu-1 .menu-item.current-menu-item>.ast-menu-toggle {
            color: var(--ast-global-color-1);
         }

         .ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children>.ast-menu-toggle {
            top: 0;
         }

         .ast-builder-menu-1 .main-header-menu>.menu-item>.sub-menu,
         .ast-builder-menu-1 .main-header-menu>.menu-item>.astra-full-megamenu-wrapper {
            margin-top: 0;
         }
      }

      .ast-builder-menu-1 {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-builder-menu-1 {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-builder-menu-1 {
            display: flex;
         }
      }

      .ast-footer-copyright {
         text-align: center;
      }

      .ast-footer-copyright {
         color: var(--ast-global-color-5);
      }

      @media (max-width:921px) {
         .ast-footer-copyright {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         .ast-footer-copyright {
            text-align: center;
         }

         .ast-footer-copyright {
            margin-top: 0px;
            margin-bottom: 0px;
         }
      }

      @media (max-width:544px) {
         .ast-footer-copyright {
            font-size: 14px;
            font-size: 0.875rem;
         }
      }

      .ast-footer-copyright.ast-builder-layout-element {
         display: flex;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-footer-copyright.ast-builder-layout-element {
            display: flex;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-footer-copyright.ast-builder-layout-element {
            display: flex;
         }
      }

      .site-footer {
         background-color: var(--ast-global-color-2);
         ;
         background-image: none;
         ;
      }

      .site-primary-footer-wrap {
         padding-top: 45px;
         padding-bottom: 45px;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
         background-color: var(--ast-global-color-2);
         ;
         background-image: none;
         ;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .ast-builder-grid-row {
         max-width: 1200px;
         margin-left: auto;
         margin-right: auto;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .ast-builder-grid-row,
      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .site-footer-section {
         align-items: center;
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-inline .site-footer-section {
         display: flex;
         margin-bottom: 0;
      }

      .ast-builder-grid-row-full .ast-builder-grid-row {
         grid-template-columns: 1fr;
      }

      @media (max-width:921px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-tablet-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-tablet-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-tablet-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      @media (max-width:544px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"] .ast-builder-grid-row {
            grid-column-gap: 20px;
            grid-row-gap: 20px;
         }

         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-mobile-inline .site-footer-section {
            display: flex;
            margin-bottom: 0;
         }

         .site-primary-footer-wrap[data-section="section-primary-footer-builder"].ast-footer-row-mobile-stack .site-footer-section {
            display: block;
            margin-bottom: 10px;
         }

         .ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row {
            grid-template-columns: 1fr;
         }
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
         padding-top: 40px;
         padding-bottom: 40px;
      }

      @media (max-width:921px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
         }
      }

      @media (max-width:544px) {
         .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            padding-top: 40px;
            padding-bottom: 40px;
            padding-left: 20px;
            padding-right: 20px;
         }
      }

      .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
         display: grid;
      }

      @media (max-width:921px) {
         .ast-header-break-point .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            display: grid;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .site-primary-footer-wrap[data-section="section-primary-footer-builder"] {
            display: grid;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {
         text-align: center;
      }

      @media (max-width:921px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {
            text-align: center;
         }
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {
            text-align: center;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {
         color: var(--ast-global-color-5);
      }

      @media (max-width:544px) {
         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {
            font-size: 14px;
            font-size: 0.875rem;
         }

         .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            margin-top: 0px;
            margin-bottom: 20px;
            margin-left: 0px;
            margin-right: 0px;
         }
      }

      .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] {
            display: block;
         }
      }

      .elementor-widget-heading .elementor-heading-title {
         margin: 0;
      }

      .elementor-page .ast-menu-toggle {
         color: unset !important;
         background: unset !important;
      }

      .elementor-post.elementor-grid-item.hentry {
         margin-bottom: 0;
      }

      .woocommerce div.product .elementor-element.elementor-products-grid .related.products ul.products li.product,
      .elementor-element .elementor-wc-products .woocommerce[class*='columns-'] ul.products li.product {
         width: auto;
         margin: 0;
         float: none;
      }

      .ast-left-sidebar .elementor-section.elementor-section-stretched,
      .ast-right-sidebar .elementor-section.elementor-section-stretched {
         max-width: 100%;
         left: 0 !important;
      }

      .elementor-template-full-width .ast-container {
         display: block;
      }

      @media (max-width:544px) {
         .elementor-element .elementor-wc-products .woocommerce[class*="columns-"] ul.products li.product {
            width: auto;
            margin: 0;
         }

         .elementor-element .woocommerce .woocommerce-result-count {
            float: none;
         }
      }

      .ast-header-break-point .main-header-bar {
         border-bottom-width: 0;
      }

      @media (min-width:922px) {
         .main-header-bar {
            border-bottom-width: 0;
         }
      }

      .main-header-menu .menu-item,
      #astra-footer-menu .menu-item,
      .main-header-bar .ast-masthead-custom-menu-items {
         -js-display: flex;
         display: flex;
         -webkit-box-pack: center;
         -webkit-justify-content: center;
         -moz-box-pack: center;
         -ms-flex-pack: center;
         justify-content: center;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -webkit-flex-direction: column;
         -moz-box-orient: vertical;
         -moz-box-direction: normal;
         -ms-flex-direction: column;
         flex-direction: column;
      }

      .main-header-menu>.menu-item>.menu-link,
      #astra-footer-menu>.menu-item>.menu-link {
         height: 100%;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -moz-box-align: center;
         -ms-flex-align: center;
         align-items: center;
         -js-display: flex;
         display: flex;
      }

      .header-main-layout-1 .ast-flex.main-header-container,
      .header-main-layout-3 .ast-flex.main-header-container {
         -webkit-align-content: center;
         -ms-flex-line-pack: center;
         align-content: center;
         -webkit-box-align: center;
         -webkit-align-items: center;
         -moz-box-align: center;
         -ms-flex-align: center;
         align-items: center;
      }

      .main-header-menu .sub-menu .menu-item.menu-item-has-children>.menu-link:after {
         position: absolute;
         right: 1em;
         top: 50%;
         transform: translate(0, -50%) rotate(270deg);
      }

      .ast-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.ast-menu-toggle::before,
      .ast-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle::before,
      .ast-mobile-popup-drawer .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle::before,
      .ast-header-break-point .ast-mobile-header-wrap .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle::before {
         font-weight: bold;
         content: "\e900";
         font-family: Astra;
         text-decoration: inherit;
         display: inline-block;
      }

      .ast-header-break-point .main-navigation ul.sub-menu .menu-item .menu-link:before {
         content: "\e900";
         font-family: Astra;
         font-size: .65em;
         text-decoration: inherit;
         display: inline-block;
         transform: translate(0, -2px) rotateZ(270deg);
         margin-right: 5px;
      }

      .widget_search .search-form:after {
         font-family: Astra;
         font-size: 1.2em;
         font-weight: normal;
         content: "\e8b6";
         position: absolute;
         top: 50%;
         right: 15px;
         transform: translate(0, -50%);
      }

      .astra-search-icon::before {
         content: "\e8b6";
         font-family: Astra;
         font-style: normal;
         font-weight: normal;
         text-decoration: inherit;
         text-align: center;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         z-index: 3;
      }

      .main-header-bar .main-header-bar-navigation .page_item_has_children>a:after,
      .main-header-bar .main-header-bar-navigation .menu-item-has-children>a:after,
      .menu-item-has-children .ast-header-navigation-arrow:after {
         content: "\e900";
         display: inline-block;
         font-family: Astra;
         font-size: .6rem;
         font-weight: bold;
         text-rendering: auto;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         margin-left: 10px;
         line-height: normal;
      }

      .menu-item-has-children .sub-menu .ast-header-navigation-arrow:after {
         margin-left: 0;
      }

      .ast-mobile-popup-drawer .main-header-bar-navigation .ast-submenu-expanded>.ast-menu-toggle::before {
         transform: rotateX(180deg);
      }

      .ast-header-break-point .main-header-bar-navigation .menu-item-has-children>.menu-link:after {
         display: none;
      }

      .ast-separate-container .blog-layout-1,
      .ast-separate-container .blog-layout-2,
      .ast-separate-container .blog-layout-3 {
         background-color: transparent;
         background-image: none;
      }

      .ast-separate-container .ast-article-post {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      @media (max-width:921px) {
         .ast-separate-container .ast-article-post {
            background-color: #ffffff;
            ;
            background-image: none;
            ;
         }
      }

      @media (max-width:544px) {
         .ast-separate-container .ast-article-post {
            background-color: #ffffff;
            ;
            background-image: none;
            ;
         }
      }

      .ast-separate-container .ast-article-single:not(.ast-related-post),
      .ast-separate-container .comments-area .comment-respond,
      .ast-separate-container .comments-area .ast-comment-list li,
      .woocommerce.ast-separate-container .ast-woocommerce-container,
      .ast-separate-container .error-404,
      .ast-separate-container .no-results,
      .single.ast-separate-container .ast-author-meta,
      .ast-separate-container .related-posts-title-wrapper,
      .ast-separate-container .comments-count-wrapper,
      .ast-box-layout.ast-plain-container .site-content,
      .ast-padded-layout.ast-plain-container .site-content,
      .ast-separate-container .comments-area .comments-title,
      .ast-separate-container .ast-archive-description {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      @media (max-width:921px) {

         .ast-separate-container .ast-article-single:not(.ast-related-post),
         .ast-separate-container .comments-area .comment-respond,
         .ast-separate-container .comments-area .ast-comment-list li,
         .woocommerce.ast-separate-container .ast-woocommerce-container,
         .ast-separate-container .error-404,
         .ast-separate-container .no-results,
         .single.ast-separate-container .ast-author-meta,
         .ast-separate-container .related-posts-title-wrapper,
         .ast-separate-container .comments-count-wrapper,
         .ast-box-layout.ast-plain-container .site-content,
         .ast-padded-layout.ast-plain-container .site-content,
         .ast-separate-container .comments-area .comments-title,
         .ast-separate-container .ast-archive-description {
            background-color: #ffffff;
            ;
            background-image: none;
            ;
         }
      }

      @media (max-width:544px) {

         .ast-separate-container .ast-article-single:not(.ast-related-post),
         .ast-separate-container .comments-area .comment-respond,
         .ast-separate-container .comments-area .ast-comment-list li,
         .woocommerce.ast-separate-container .ast-woocommerce-container,
         .ast-separate-container .error-404,
         .ast-separate-container .no-results,
         .single.ast-separate-container .ast-author-meta,
         .ast-separate-container .related-posts-title-wrapper,
         .ast-separate-container .comments-count-wrapper,
         .ast-box-layout.ast-plain-container .site-content,
         .ast-padded-layout.ast-plain-container .site-content,
         .ast-separate-container .comments-area .comments-title,
         .ast-separate-container .ast-archive-description {
            background-color: #ffffff;
            ;
            background-image: none;
            ;
         }
      }

      .ast-separate-container.ast-two-container #secondary .widget {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      @media (max-width:921px) {
         .ast-separate-container.ast-two-container #secondary .widget {
            background-color: #ffffff;
            ;
            background-image: none;
            ;
         }
      }

      @media (max-width:544px) {
         .ast-separate-container.ast-two-container #secondary .widget {
            background-color: #ffffff;
            ;
            background-image: none;
            ;
         }
      }

      .ast-mobile-header-content>*,
      .ast-desktop-header-content>* {
         padding: 10px 0;
         height: auto;
      }

      .ast-mobile-header-content>*:first-child,
      .ast-desktop-header-content>*:first-child {
         padding-top: 10px;
      }

      .ast-mobile-header-content>.ast-builder-menu,
      .ast-desktop-header-content>.ast-builder-menu {
         padding-top: 0;
      }

      .ast-mobile-header-content>*:last-child,
      .ast-desktop-header-content>*:last-child {
         padding-bottom: 0;
      }

      .ast-mobile-header-content .ast-search-menu-icon.ast-inline-search label,
      .ast-desktop-header-content .ast-search-menu-icon.ast-inline-search label {
         width: 100%;
      }

      .ast-desktop-header-content .main-header-bar-navigation .ast-submenu-expanded>.ast-menu-toggle::before {
         transform: rotateX(180deg);
      }

      #ast-desktop-header .ast-desktop-header-content,
      .ast-mobile-header-content .ast-search-icon,
      .ast-desktop-header-content .ast-search-icon,
      .ast-mobile-header-wrap .ast-mobile-header-content,
      .ast-main-header-nav-open.ast-popup-nav-open .ast-mobile-header-wrap .ast-mobile-header-content,
      .ast-main-header-nav-open.ast-popup-nav-open .ast-desktop-header-content {
         display: none;
      }

      .ast-main-header-nav-open.ast-header-break-point #ast-desktop-header .ast-desktop-header-content,
      .ast-main-header-nav-open.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content {
         display: block;
      }

      .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up>.menu-item>.sub-menu,
      .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up>.menu-item .menu-item>.sub-menu,
      .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down>.menu-item>.sub-menu,
      .ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down>.menu-item .menu-item>.sub-menu,
      .ast-desktop .ast-desktop-header-content .astra-menu-animation-fade>.menu-item>.sub-menu,
      .ast-desktop .ast-desktop-header-content .astra-menu-animation-fade>.menu-item .menu-item>.sub-menu {
         opacity: 1;
         visibility: visible;
      }

      .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation {
         width: unset;
         margin: unset;
      }

      .ast-mobile-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle,
      .ast-desktop-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle {
         left: calc(20px - 0.907em);
         right: auto;
      }

      .ast-mobile-header-content .ast-search-menu-icon,
      .ast-mobile-header-content .ast-search-menu-icon.slide-search,
      .ast-desktop-header-content .ast-search-menu-icon,
      .ast-desktop-header-content .ast-search-menu-icon.slide-search {
         width: 100%;
         position: relative;
         display: block;
         right: auto;
         transform: none;
      }

      .ast-mobile-header-content .ast-search-menu-icon.slide-search .search-form,
      .ast-mobile-header-content .ast-search-menu-icon .search-form,
      .ast-desktop-header-content .ast-search-menu-icon.slide-search .search-form,
      .ast-desktop-header-content .ast-search-menu-icon .search-form {
         right: 0;
         visibility: visible;
         opacity: 1;
         position: relative;
         top: auto;
         transform: none;
         padding: 0;
         display: block;
         overflow: hidden;
      }

      .ast-mobile-header-content .ast-search-menu-icon.ast-inline-search .search-field,
      .ast-mobile-header-content .ast-search-menu-icon .search-field,
      .ast-desktop-header-content .ast-search-menu-icon.ast-inline-search .search-field,
      .ast-desktop-header-content .ast-search-menu-icon .search-field {
         width: 100%;
         padding-right: 5.5em;
      }

      .ast-mobile-header-content .ast-search-menu-icon .search-submit,
      .ast-desktop-header-content .ast-search-menu-icon .search-submit {
         display: block;
         position: absolute;
         height: 100%;
         top: 0;
         right: 0;
         padding: 0 1em;
         border-radius: 0;
      }

      .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation ul .sub-menu .menu-link {
         padding-left: 30px;
      }

      .ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation .sub-menu .menu-item .menu-item .menu-link {
         padding-left: 40px;
      }

      .ast-mobile-popup-drawer.active .ast-mobile-popup-inner {
         background-color: var(--ast-global-color-5);
         ;
      }

      .ast-mobile-header-wrap .ast-mobile-header-content,
      .ast-desktop-header-content {
         background-color: var(--ast-global-color-5);
         ;
      }

      .ast-mobile-popup-content>*,
      .ast-mobile-header-content>*,
      .ast-desktop-popup-content>*,
      .ast-desktop-header-content>* {
         padding-top: 0;
         padding-bottom: 0;
      }

      .content-align-flex-start .ast-builder-layout-element {
         justify-content: flex-start;
      }

      .content-align-flex-start .main-header-menu {
         text-align: left;
      }

      .ast-mobile-popup-drawer.active .menu-toggle-close {
         color: #3a3a3a;
      }

      .ast-mobile-header-wrap .ast-primary-header-bar,
      .ast-primary-header-bar .site-primary-header-wrap {
         min-height: 70px;
      }

      .ast-desktop .ast-primary-header-bar .main-header-menu>.menu-item {
         line-height: 70px;
      }

      @media (max-width:921px) {

         #masthead .ast-mobile-header-wrap .ast-primary-header-bar,
         #masthead .ast-mobile-header-wrap .ast-below-header-bar {
            padding-left: 20px;
            padding-right: 20px;
         }
      }

      .ast-header-break-point .ast-primary-header-bar {
         border-bottom-width: 0;
         border-bottom-color: #eaeaea;
         border-bottom-style: solid;
      }

      @media (min-width:922px) {
         .ast-primary-header-bar {
            border-bottom-width: 0;
            border-bottom-color: #eaeaea;
            border-bottom-style: solid;
         }
      }

      .ast-primary-header-bar {
         background-color: var(--ast-global-color-5);
         ;
         background-image: none;
         ;
      }

      @media (max-width:921px) {
         .ast-primary-header-bar.ast-primary-header {
            background-color: var(--ast-global-color-5);
            ;
            background-image: none;
            ;
         }
      }

      @media (max-width:544px) {
         .ast-primary-header-bar.ast-primary-header {
            background-color: var(--ast-global-color-5);
            ;
            background-image: none;
            ;
         }
      }

      .ast-primary-header-bar {
         display: block;
      }

      @media (max-width:921px) {
         .ast-header-break-point .ast-primary-header-bar {
            display: grid;
         }
      }

      @media (max-width:544px) {
         .ast-header-break-point .ast-primary-header-bar {
            display: grid;
         }
      }

      [data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-fill {
         color: var(--ast-global-color-5);
         border: none;
         background: var(--ast-global-color-0);
         border-top-left-radius: 2px;
         border-top-right-radius: 2px;
         border-bottom-right-radius: 2px;
         border-bottom-left-radius: 2px;
      }

      [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg {
         width: 20px;
         height: 20px;
         fill: var(--ast-global-color-5);
      }

      [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-wrap .mobile-menu {
         color: var(--ast-global-color-5);
      }

      :root {
         --e-global-color-astglobalcolor0: #fb2056;
         --e-global-color-astglobalcolor1: #da1c4b;
         --e-global-color-astglobalcolor2: #191919;
         --e-global-color-astglobalcolor3: #404040;
         --e-global-color-astglobalcolor4: #f5f5f5;
         --e-global-color-astglobalcolor5: #ffffff;
         --e-global-color-astglobalcolor6: #ececec;
         --e-global-color-astglobalcolor7: #313131;
         --e-global-color-astglobalcolor8: #000000;
      }
   </style>
   <link rel='stylesheet' id='astra-google-fonts-css' href='https://fonts.googleapis.com/css?family=Noto+Sans%3A400%2C700%7CMontserrat%3A700&#038;display=fallback&#038;ver=4.2.1' media='all' />
   <link rel='stylesheet' id='wp-block-library-css' href='./css/dist-block-library-style.min.css' media='all' />
   <style id='depicter-slider-style-inline-css'>
      /*!***************************************************************************************************************************************************************************************************************************************!*\   !*** css ./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[3].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[3].use[2]!./node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[3].use[3]!./src/style.scss ***!   \***************************************************************************************************************************************************************************************************************************************/
      /**  * The following styles get applied both on the front of your site  * and in the editor.  *  * Replace them with your own styles or remove the file completely.  */
      .wp-block-create-block-depicter {
         background-color: #21759b;
         color: #fff;
         padding: 2px;
      }

      /*# sourceMappingURL=style-index.css.map*/
   </style>
   <style id='global-styles-inline-css'>
      body {
         --wp--preset--color--black: #000000;
         --wp--preset--color--cyan-bluish-gray: #abb8c3;
         --wp--preset--color--white: #ffffff;
         --wp--preset--color--pale-pink: #f78da7;
         --wp--preset--color--vivid-red: #cf2e2e;
         --wp--preset--color--luminous-vivid-orange: #ff6900;
         --wp--preset--color--luminous-vivid-amber: #fcb900;
         --wp--preset--color--light-green-cyan: #7bdcb5;
         --wp--preset--color--vivid-green-cyan: #00d084;
         --wp--preset--color--pale-cyan-blue: #8ed1fc;
         --wp--preset--color--vivid-cyan-blue: #0693e3;
         --wp--preset--color--vivid-purple: #9b51e0;
         --wp--preset--color--ast-global-color-0: var(--ast-global-color-0);
         --wp--preset--color--ast-global-color-1: var(--ast-global-color-1);
         --wp--preset--color--ast-global-color-2: var(--ast-global-color-2);
         --wp--preset--color--ast-global-color-3: var(--ast-global-color-3);
         --wp--preset--color--ast-global-color-4: var(--ast-global-color-4);
         --wp--preset--color--ast-global-color-5: var(--ast-global-color-5);
         --wp--preset--color--ast-global-color-6: var(--ast-global-color-6);
         --wp--preset--color--ast-global-color-7: var(--ast-global-color-7);
         --wp--preset--color--ast-global-color-8: var(--ast-global-color-8);
         --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
         --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
         --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
         --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
         --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
         --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
         --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
         --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
         --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
         --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
         --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
         --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
         --wp--preset--font-size--small: 13px;
         --wp--preset--font-size--medium: 20px;
         --wp--preset--font-size--large: 36px;
         --wp--preset--font-size--x-large: 42px;
         --wp--preset--spacing--20: 0.44rem;
         --wp--preset--spacing--30: 0.67rem;
         --wp--preset--spacing--40: 1rem;
         --wp--preset--spacing--50: 1.5rem;
         --wp--preset--spacing--60: 2.25rem;
         --wp--preset--spacing--70: 3.38rem;
         --wp--preset--spacing--80: 5.06rem;
         --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
         --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
         --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
         --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
         --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
      }

      body {
         margin: 0;
         --wp--style--global--content-size: var(--wp--custom--ast-content-width-size);
         --wp--style--global--wide-size: var(--wp--custom--ast-wide-width-size);
      }

      .wp-site-blocks>.alignleft {
         float: left;
         margin-right: 2em;
      }

      .wp-site-blocks>.alignright {
         float: right;
         margin-left: 2em;
      }

      .wp-site-blocks>.aligncenter {
         justify-content: center;
         margin-left: auto;
         margin-right: auto;
      }

      :where(.wp-site-blocks)>* {
         margin-block-start: 24px;
         margin-block-end: 0;
      }

      :where(.wp-site-blocks)> :first-child:first-child {
         margin-block-start: 0;
      }

      :where(.wp-site-blocks)> :last-child:last-child {
         margin-block-end: 0;
      }

      body {
         --wp--style--block-gap: 24px;
      }

      :where(body .is-layout-flow)> :first-child:first-child {
         margin-block-start: 0;
      }

      :where(body .is-layout-flow)> :last-child:last-child {
         margin-block-end: 0;
      }

      :where(body .is-layout-flow)>* {
         margin-block-start: 24px;
         margin-block-end: 0;
      }

      :where(body .is-layout-constrained)> :first-child:first-child {
         margin-block-start: 0;
      }

      :where(body .is-layout-constrained)> :last-child:last-child {
         margin-block-end: 0;
      }

      :where(body .is-layout-constrained)>* {
         margin-block-start: 24px;
         margin-block-end: 0;
      }

      :where(body .is-layout-flex) {
         gap: 24px;
      }

      :where(body .is-layout-grid) {
         gap: 24px;
      }

      body .is-layout-flow>.alignleft {
         float: left;
         margin-inline-start: 0;
         margin-inline-end: 2em;
      }

      body .is-layout-flow>.alignright {
         float: right;
         margin-inline-start: 2em;
         margin-inline-end: 0;
      }

      body .is-layout-flow>.aligncenter {
         margin-left: auto !important;
         margin-right: auto !important;
      }

      body .is-layout-constrained>.alignleft {
         float: left;
         margin-inline-start: 0;
         margin-inline-end: 2em;
      }

      body .is-layout-constrained>.alignright {
         float: right;
         margin-inline-start: 2em;
         margin-inline-end: 0;
      }

      body .is-layout-constrained>.aligncenter {
         margin-left: auto !important;
         margin-right: auto !important;
      }

      body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
         max-width: var(--wp--style--global--content-size);
         margin-left: auto !important;
         margin-right: auto !important;
      }

      body .is-layout-constrained>.alignwide {
         max-width: var(--wp--style--global--wide-size);
      }

      body .is-layout-flex {
         display: flex;
      }

      body .is-layout-flex {
         flex-wrap: wrap;
         align-items: center;
      }

      body .is-layout-flex>* {
         margin: 0;
      }

      body .is-layout-grid {
         display: grid;
      }

      body .is-layout-grid>* {
         margin: 0;
      }

      body {
         padding-top: 0px;
         padding-right: 0px;
         padding-bottom: 0px;
         padding-left: 0px;
      }

      a:where(:not(.wp-element-button)) {
         text-decoration: none;
      }

      .wp-element-button,
      .wp-block-button__link {
         background-color: #32373c;
         border-width: 0;
         color: #fff;
         font-family: inherit;
         font-size: inherit;
         line-height: inherit;
         padding: calc(0.667em + 2px) calc(1.333em + 2px);
         text-decoration: none;
      }

      .has-black-color {
         color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-color {
         color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-color {
         color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-color {
         color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-color {
         color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-color {
         color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-color {
         color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-color {
         color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-color {
         color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-color {
         color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-color {
         color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-color {
         color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-ast-global-color-0-color {
         color: var(--wp--preset--color--ast-global-color-0) !important;
      }

      .has-ast-global-color-1-color {
         color: var(--wp--preset--color--ast-global-color-1) !important;
      }

      .has-ast-global-color-2-color {
         color: var(--wp--preset--color--ast-global-color-2) !important;
      }

      .has-ast-global-color-3-color {
         color: var(--wp--preset--color--ast-global-color-3) !important;
      }

      .has-ast-global-color-4-color {
         color: var(--wp--preset--color--ast-global-color-4) !important;
      }

      .has-ast-global-color-5-color {
         color: var(--wp--preset--color--ast-global-color-5) !important;
      }

      .has-ast-global-color-6-color {
         color: var(--wp--preset--color--ast-global-color-6) !important;
      }

      .has-ast-global-color-7-color {
         color: var(--wp--preset--color--ast-global-color-7) !important;
      }

      .has-ast-global-color-8-color {
         color: var(--wp--preset--color--ast-global-color-8) !important;
      }

      .has-black-background-color {
         background-color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-background-color {
         background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-background-color {
         background-color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-background-color {
         background-color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-background-color {
         background-color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-background-color {
         background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-background-color {
         background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-background-color {
         background-color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-background-color {
         background-color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-background-color {
         background-color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-background-color {
         background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-background-color {
         background-color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-ast-global-color-0-background-color {
         background-color: var(--wp--preset--color--ast-global-color-0) !important;
      }

      .has-ast-global-color-1-background-color {
         background-color: var(--wp--preset--color--ast-global-color-1) !important;
      }

      .has-ast-global-color-2-background-color {
         background-color: var(--wp--preset--color--ast-global-color-2) !important;
      }

      .has-ast-global-color-3-background-color {
         background-color: var(--wp--preset--color--ast-global-color-3) !important;
      }

      .has-ast-global-color-4-background-color {
         background-color: var(--wp--preset--color--ast-global-color-4) !important;
      }

      .has-ast-global-color-5-background-color {
         background-color: var(--wp--preset--color--ast-global-color-5) !important;
      }

      .has-ast-global-color-6-background-color {
         background-color: var(--wp--preset--color--ast-global-color-6) !important;
      }

      .has-ast-global-color-7-background-color {
         background-color: var(--wp--preset--color--ast-global-color-7) !important;
      }

      .has-ast-global-color-8-background-color {
         background-color: var(--wp--preset--color--ast-global-color-8) !important;
      }

      .has-black-border-color {
         border-color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-border-color {
         border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-border-color {
         border-color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-border-color {
         border-color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-border-color {
         border-color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-border-color {
         border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-border-color {
         border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-border-color {
         border-color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-border-color {
         border-color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-border-color {
         border-color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-border-color {
         border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-border-color {
         border-color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-ast-global-color-0-border-color {
         border-color: var(--wp--preset--color--ast-global-color-0) !important;
      }

      .has-ast-global-color-1-border-color {
         border-color: var(--wp--preset--color--ast-global-color-1) !important;
      }

      .has-ast-global-color-2-border-color {
         border-color: var(--wp--preset--color--ast-global-color-2) !important;
      }

      .has-ast-global-color-3-border-color {
         border-color: var(--wp--preset--color--ast-global-color-3) !important;
      }

      .has-ast-global-color-4-border-color {
         border-color: var(--wp--preset--color--ast-global-color-4) !important;
      }

      .has-ast-global-color-5-border-color {
         border-color: var(--wp--preset--color--ast-global-color-5) !important;
      }

      .has-ast-global-color-6-border-color {
         border-color: var(--wp--preset--color--ast-global-color-6) !important;
      }

      .has-ast-global-color-7-border-color {
         border-color: var(--wp--preset--color--ast-global-color-7) !important;
      }

      .has-ast-global-color-8-border-color {
         border-color: var(--wp--preset--color--ast-global-color-8) !important;
      }

      .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
         background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
      }

      .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
         background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
      }

      .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
         background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-orange-to-vivid-red-gradient-background {
         background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
      }

      .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
         background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
      }

      .has-cool-to-warm-spectrum-gradient-background {
         background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
      }

      .has-blush-light-purple-gradient-background {
         background: var(--wp--preset--gradient--blush-light-purple) !important;
      }

      .has-blush-bordeaux-gradient-background {
         background: var(--wp--preset--gradient--blush-bordeaux) !important;
      }

      .has-luminous-dusk-gradient-background {
         background: var(--wp--preset--gradient--luminous-dusk) !important;
      }

      .has-pale-ocean-gradient-background {
         background: var(--wp--preset--gradient--pale-ocean) !important;
      }

      .has-electric-grass-gradient-background {
         background: var(--wp--preset--gradient--electric-grass) !important;
      }

      .has-midnight-gradient-background {
         background: var(--wp--preset--gradient--midnight) !important;
      }

      .has-small-font-size {
         font-size: var(--wp--preset--font-size--small) !important;
      }

      .has-medium-font-size {
         font-size: var(--wp--preset--font-size--medium) !important;
      }

      .has-large-font-size {
         font-size: var(--wp--preset--font-size--large) !important;
      }

      .has-x-large-font-size {
         font-size: var(--wp--preset--font-size--x-large) !important;
      }

      .wp-block-navigation a:where(:not(.wp-element-button)) {
         color: inherit;
      }

      .wp-block-pullquote {
         font-size: 1.5em;
         line-height: 1.6;
      }
   </style>
   <link rel='stylesheet' id='depicter-front-pre-css' href='./css/depicter-resources-styles-player-depicter-pre.css' media='all' />
   <link rel="preload" as="style" onload="this.rel='stylesheet';this.onload=null" id='depicter--front-common-css' href='./css/depicter-resources-styles-player-depicter.css' media='all' />
   <link rel='stylesheet' id='wpos-slick-style-css' href='./css/wp-responsive-recent-post-slider-assets-css-slick.css' media='all' />
   <link rel='stylesheet' id='wppsac-public-style-css' href='./css/wp-responsive-recent-post-slider-assets-css-recent-post-style.css' media='all' />
   <link rel='stylesheet' id='hfe-style-css' href='./css/header-footer-elementor-assets-css-header-footer-elementor.css' media='all' />
   <link rel='stylesheet' id='elementor-frontend-css' href='./css/elementor-assets-css-frontend-lite.min.css' media='all' />
   <link rel='stylesheet' id='eael-general-css' href='./css/essential-addons-for-elementor-lite-assets-front-end-css-view-general.min.css' media='all' />
   <link rel='stylesheet' id='eael-1450-css' href='./css/essential-addons-elementor-eael-1450.css' media='all' />
   <link rel='stylesheet' id='elementor-icons-css' href='./css/elementor-assets-lib-eicons-css-elementor-icons.min.css' media='all' />
   <style id='elementor-icons-inline-css'>
      .elementor-add-new-section .elementor-add-templately-promo-button {
         background-color: #5d4fff;
         background-image: url(https://positiivplus.com/wordpress/wp-content/plugins/essential-addons-for-elementor-lite/assets/admin/images/templately/logo-icon.svg);
         background-repeat: no-repeat;
         background-position: center center;
         position: relative;
      }

      .elementor-add-new-section .elementor-add-templately-promo-button>i {
         height: 12px;
      }

      body .elementor-add-new-section .elementor-add-section-area-button {
         margin-left: 0;
      }

      .elementor-add-new-section .elementor-add-templately-promo-button {
         background-color: #5d4fff;
         background-image: url(https://positiivplus.com/wordpress/wp-content/plugins/essential-addons-for-elementor-lite/assets/admin/images/templately/logo-icon.svg);
         background-repeat: no-repeat;
         background-position: center center;
         position: relative;
      }

      .elementor-add-new-section .elementor-add-templately-promo-button>i {
         height: 12px;
      }

      body .elementor-add-new-section .elementor-add-section-area-button {
         margin-left: 0;
      }
   </style>
   <link rel='stylesheet' id='swiper-css' href='./css/elementor-assets-lib-swiper-v8-css-swiper.min.css' media='all' />
   <link rel='stylesheet' id='elementor-post-442-css' href='./css/elementor-css-post-442.css' media='all' />
   <link rel='stylesheet' id='lae-animate-css' href='./css/addons-for-elementor-assets-css-lib-animate.css' media='all' />
   <link rel='stylesheet' id='lae-sliders-styles-css' href='./css/addons-for-elementor-assets-css-lib-sliders.min.css' media='all' />
   <link rel='stylesheet' id='lae-icomoon-styles-css' href='./css/addons-for-elementor-assets-css-icomoon.css' media='all' />
   <link rel='stylesheet' id='lae-frontend-styles-css' href='./css/addons-for-elementor-assets-css-lae-frontend.css' media='all' />
   <link rel='stylesheet' id='lae-grid-styles-css' href='./css/addons-for-elementor-assets-css-lae-grid.css' media='all' />
   <link rel='stylesheet' id='lae-widgets-styles-css' href='./css/addons-for-elementor-assets-css-widgets-lae-widgets.min.css' media='all' />
   <link rel='stylesheet' id='elementor-pro-css' href='./css/elementor-pro-assets-css-frontend-lite.min.css' media='all' />
   <link rel='stylesheet' id='hfe-widgets-style-css' href='./css/header-footer-elementor-inc-widgets-css-frontend.css' media='all' />
   <link rel='stylesheet' id='elementor-post-1450-css' href='./css/elementor-css-post-1450.css' media='all' />
   <link rel='stylesheet' id='elementor-post-976-css' href='./css/elementor-css-post-976.css' media='all' />
   <link rel='stylesheet' id='elementor-post-990-css' href='./css/elementor-css-post-990.css' media='all' />
   <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.3.1' media='all' />
   <link rel='stylesheet' id='elementor-icons-shared-0-css' href='./css/elementor-assets-lib-font-awesome-css-fontawesome.min.css' media='all' />
   <link rel='stylesheet' id='elementor-icons-fa-solid-css' href='./css/elementor-assets-lib-font-awesome-css-solid.min.css' media='all' />
   <link rel='stylesheet' id='elementor-icons-fa-regular-css' href='./css/elementor-assets-lib-font-awesome-css-regular.min.css' media='all' />
   <link rel='stylesheet' id='elementor-icons-fa-brands-css' href='./css/elementor-assets-lib-font-awesome-css-brands.min.css' media='all' />
   <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
   <script>
      /* <![CDATA[ */
      var rcewpp = {
         "ajax_url": "https://positiivplus.com/wordpress/wp-admin/admin-ajax.php",
         "nonce": "3d4e7781b0",
         "home_url": "https://positiivplus.com/wordpress/",
         "settings_icon": 'https://positiivplus.com/wordpress/wp-content/plugins/export-wp-page-to-static-html/admin/images/settings.png',
         "settings_hover_icon": 'https://positiivplus.com/wordpress/wp-content/plugins/export-wp-page-to-static-html/admin/images/settings_hover.png'
      };
      /* ]]\> */
   </script> <!--[if IE]> <script src='https://positiivplus.com/wordpress/wp-content/themes/astra/assets/js/minified/flexibility.min.js?ver=4.2.1' id='astra-flexibility-js'></script> <script id="astra-flexibility-js-after">
         flexibility(document.documentElement);
      </script> <![endif]-->
   <script src='./js/jquery-jquery.min.js' id='jquery-core-js'></script>
   <script src='./js/jquery-jquery-migrate.min.js' id='jquery-migrate-js'></script>
   <link rel="https://api.w.org/" href="https://positiivplus.com/wordpress/wp-json/" />
   <link rel="alternate" type="application/json" href="https://positiivplus.com/wordpress/wp-json/wp/v2/pages/1450" />
   <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://positiivplus.com/wordpress/xmlrpc.php?rsd" />
   <meta name="generator" content="WordPress 6.3.1" />
   <link rel="canonical" href="https://positiivplus.com/wordpress/features/" />
   <link rel='shortlink' href='https://positiivplus.com/wordpress/?p=1450' />
   <link rel="alternate" type="application/json+oembed" href="https://positiivplus.com/wordpress/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpositiivplus.com%2Fwordpress%2Ffeatures%2F" />
   <link rel="alternate" type="text/xml+oembed" href="https://positiivplus.com/wordpress/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpositiivplus.com%2Fwordpress%2Ffeatures%2F&#038;format=xml" />
   <script type="text/javascript">
      (function() {
         window.lae_fs = {
            can_use_premium_code: false
         };
      })();
   </script>
   <meta name="generator" content="Elementor 3.15.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
   <style id="uagb-style-frontend-1450">
      .uag-blocks-common-selector {
         z-index: var(--z-index-desktop) !important
      }

      @media (max-width: 976px) {
         .uag-blocks-common-selector {
            z-index: var(--z-index-tablet) !important
         }
      }

      @media (max-width: 767px) {
         .uag-blocks-common-selector {
            z-index: var(--z-index-mobile) !important
         }
      }
   </style>
   <link rel="icon" href="./images/Group-378.svg" sizes="32x32" />
   <link rel="icon" href="./images/Group-378.svg" sizes="192x192" />
   <link rel="apple-touch-icon" href="./images/Group-378.svg" />
   <meta name="msapplication-TileImage" content="https://positiivplus.com/wordpress/wp-content/uploads/2023/08/Group-378.svg" />
   <style id="wp-custom-css">
      @media only screen and (max-width: 767px) {
         .dc-cenetr p {
            text-align: center !important;
         }
      }
   </style>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
</head>

<body class="page-template page-template-elementor_canvas page page-id-1450 ehf-header ehf-footer ehf-template-astra ehf-stylesheet-astra ast-desktop ast-separate-container ast-two-container ast-no-sidebar astra-4.2.1 ast-single-post ast-replace-site-logo-transparent ast-inherit-site-logo-transparent ast-hfb-header elementor-default elementor-template-canvas elementor-kit-442 elementor-page elementor-page-1450">
   <?php include('header.php'); ?>
   <div data-elementor-type="wp-page" data-elementor-id="1450" class="elementor elementor-1450">
      <section class="elementor-section elementor-top-section elementor-element elementor-element-4eac1d8 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="4eac1d8" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7ba0bb0" data-id="7ba0bb0" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-b524071 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="b524071" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-22953a3" data-id="22953a3" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-0201b2a elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="0201b2a" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">Building</span> a <br>Future-Ready Business</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-5bd2617 elementor-widget elementor-widget-heading" data-id="5bd2617" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default"> ESG Integration for Business Growth</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-71fb8aa elementor-widget elementor-widget-text-editor" data-id="71fb8aa" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <style>
                                       /*! elementor - v3.15.0 - 20-08-2023 */
                                       .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                          background-color: #69727d;
                                          color: #fff
                                       }

                                       .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                          color: #69727d;
                                          border: 3px solid;
                                          background-color: transparent
                                       }

                                       .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                          margin-top: 8px
                                       }

                                       .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                          width: 1em;
                                          height: 1em
                                       }

                                       .elementor-widget-text-editor .elementor-drop-cap {
                                          float: left;
                                          text-align: center;
                                          line-height: 1;
                                          font-size: 50px
                                       }

                                       .elementor-widget-text-editor .elementor-drop-cap-letter {
                                          display: inline-block
                                       }
                                    </style>
                                    <p>Discover how POSITIIVPLUS, our B2B Cloud-based SaaS tool, seamlessly integrates ESG Compliance with your business. It&#8217;s a dynamic platform for building a future-ready company, opening up exciting new avenues for growth and development in sustainability-focused market segments. Plus, you&#8217;ll have access to a B2B marketplace, essentially a green business database, ensuring simultaneous sustainability growth and business growth.</p>
                                 </div>
                              </div>
                              <section class="elementor-section elementor-inner-section elementor-element elementor-element-0fae2ef elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="0fae2ef" data-element_type="section">
                                 <div class="elementor-container elementor-column-gap-custom">
                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-f6e33f1" data-id="f6e33f1" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-57e55d5 elementor-align-left elementor-widget__width-initial elementor-mobile-align-justify elementor-widget elementor-widget-button" data-id="57e55d5" data-element_type="widget" data-widget_type="button.default">
                                             <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-md" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-chevron-right"></i> </span> <span class="elementor-button-text">get started</span> </span> </a> </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4735da0" data-id="4735da0" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-2cfe3af elementor-widget elementor-widget-image" data-id="2cfe3af" data-element_type="widget" data-widget_type="image.default">
                                 <div class="elementor-widget-container"> <img decoding="async" fetchpriority="high" width="863" height="732" src="./images/2023-09-1.-Image_Features.png" class="attachment-large size-large wp-image-2742" alt="" /> </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <div class="elementor-element elementor-element-51204f3 elementor-widget elementor-widget-image" data-id="51204f3" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <a href="#your-esg-report"> <img decoding="async" width="640" height="640" src="./images/2023-08-fast-forward.gif" class="attachment-large size-large wp-image-843" alt="" /> </a> </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-5f5373b elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="5f5373b" data-element_type="section" id="your-esg-report" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6b7f87a" data-id="6b7f87a" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-8aadbfb elementor-widget__width-inherit elementor-widget-tablet__width-initial elementor-widget elementor-widget-heading" data-id="8aadbfb" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-large"> Get the most out of <br> your <span style="color:#64C397;">ESG Report</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-n0t4zrv elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="n0t4zrv" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-background-overlay"></div>
         <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f5fbb7e" data-id="f5fbb7e" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-ba0d10b elementor-widget elementor-widget-image" data-id="ba0d10b" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" src="./images/2023-09-1_ESGReport.gif" title="1_ESGReport" alt="1_ESGReport" loading="lazy" /> </div>
                  </div>
                  <div class="elementor-element elementor-element-d092873 elementor-widget elementor-widget-heading" data-id="d092873" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">B2B Cloud-Based SaaS Tool</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-8ce321c elementor-widget elementor-widget-text-editor" data-id="8ce321c" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>Cloud-powered business solution <br />for ultimate flexibility</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-402c207" data-id="402c207" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-06cb3d3 elementor-widget elementor-widget-image" data-id="06cb3d3" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" src="./images/2023-09-2_ESGReport.gif" title="2_ESGReport" alt="2_ESGReport" loading="lazy" /> </div>
                  </div>
                  <div class="elementor-element elementor-element-64054e5 elementor-widget elementor-widget-heading" data-id="64054e5" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">User-Friendly Interface</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-c092a15 elementor-widget elementor-widget-text-editor" data-id="c092a15" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>Simplify complex tasks <br />with our intuitive design</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-51dad24" data-id="51dad24" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-79a885c elementor-widget elementor-widget-image" data-id="79a885c" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" src="./images/2023-09-3_ESGReport.gif" title="3_ESGReport" alt="3_ESGReport" loading="lazy" /> </div>
                  </div>
                  <div class="elementor-element elementor-element-7636458 elementor-widget elementor-widget-heading" data-id="7636458" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">Dynamic & Interactive Platform</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-2828e57 elementor-widget elementor-widget-text-editor" data-id="2828e57" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container"> Advanced Add-Ons, Automations, <br>Customizations </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-7798e8f elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7798e8f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-background-overlay"></div>
         <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-b277f01" data-id="b277f01" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-714b416 elementor-widget elementor-widget-image" data-id="714b416" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" width="640" height="640" src="./images/2023-09-4_ESGReport.gif" class="attachment-full size-full wp-image-2755" alt="" /> </div>
                  </div>
                  <div class="elementor-element elementor-element-e5091c4 elementor-widget elementor-widget-heading" data-id="e5091c4" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">Data Backed Business Intelligence</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-955a4c0 elementor-widget elementor-widget-text-editor" data-id="955a4c0" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>Data made actionable for <br />real-time strategic choices</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-044e26e" data-id="044e26e" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-24ed6b6 elementor-widget elementor-widget-image" data-id="24ed6b6" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="640" height="640" src="./images/2023-09-5_ESGReport.gif" class="attachment-full size-full wp-image-2756" alt="" /> </div>
                  </div>
                  <div class="elementor-element elementor-element-c03901c elementor-widget elementor-widget-heading" data-id="c03901c" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">B2B Green Business Directory</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-84d12c7 elementor-widget elementor-widget-text-editor" data-id="84d12c7" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>The marketplace for sustainable <br />B2B connections</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-9c8bd14" data-id="9c8bd14" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-a1126f7 elementor-widget elementor-widget-image" data-id="a1126f7" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="640" height="640" src="./images/2023-09-6_ESGReport.gif" class="attachment-full size-full wp-image-2757" alt="" /> </div>
                  </div>
                  <div class="elementor-element elementor-element-215a343 elementor-widget elementor-widget-heading" data-id="215a343" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">Capture The Market</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-cb958e9 elementor-widget elementor-widget-text-editor" data-id="cb958e9" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>Elevate your business as <br />the market frontrunner</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-27280a0 elementor-section-height-min-height elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-items-middle" data-id="27280a0" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-3589996" data-id="3589996" data-element_type="column">
               <div class="elementor-widget-wrap"> </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-b3c6699" data-id="b3c6699" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-c9585bc elementor-widget elementor-widget-text-editor" data-id="c9585bc" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <ul>
                           <li>Instant Business Insights </li>
                           <li>Cutting-Edge B2B Solution</li>
                           <li>Green Market Access </li>
                           <li>Innovative Growth Tools</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-18c6fb0" data-id="18c6fb0" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-346f214 elementor-align-center elementor-widget elementor-widget-button" data-id="346f214" data-element_type="widget" data-widget_type="button.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-chevron-right"></i> </span> <span class="elementor-button-text">join the future</span> </span> </a> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-a9a9943 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="a9a9943" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b05d6db" data-id="b05d6db" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-c01d8aa elementor-widget elementor-widget-heading" data-id="c01d8aa" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">Green</span> Intelligence<br> </div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-75e63fd elementor-widget elementor-widget-text-editor" data-id="75e63fd" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>Experience the future of sustainable business growth with Green Intelligence. Our data-driven approach empowers businesses to make informed decisions for effective market penetration in the sustainability sector, ensuring strategic success and a lasting impact.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-ab47109 elementor-section-full_width animated-slow elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="ab47109" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:0}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-cd742a7" data-id="cd742a7" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-8cd500c elementor-widget elementor-widget-image" data-id="8cd500c" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="150" height="79" src="./images/2023-09-Step-1Image_Step-1-1.svg" class="attachment-thumbnail size-thumbnail wp-image-2798" alt="" /> </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-aadae79" data-id="aadae79" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-239eb02 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="239eb02" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a4323af" data-id="a4323af" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-53b61fd elementor-widget elementor-widget-heading" data-id="53b61fd" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">STEP 1</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-c37a56b" data-id="c37a56b" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-c4646ae elementor-widget elementor-widget-heading" data-id="c4646ae" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">Collect and Organize </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-5946b0e elementor-widget elementor-widget-text-editor" data-id="5946b0e" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>POSITIIVPLUS starts by collecting and organizing extensive business data and buying signals from various sources. We use advanced technology, specialized third-party providers, input from our community, and a dedicated research team to source this data.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-ba01744 elementor-section-full_width animated-slow elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="ba01744" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeIn&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3853b2b" data-id="3853b2b" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-d23002a elementor-widget elementor-widget-image" data-id="d23002a" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="764" height="400" src="./images/2023-09-Step-2Image_Step-1.svg" class="attachment-large size-large wp-image-2793" alt="" /> </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5fe3296" data-id="5fe3296" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-b45cec7 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b45cec7" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-9c9c3ae" data-id="9c9c3ae" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-21b457a elementor-widget elementor-widget-heading" data-id="21b457a" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">STEP 2</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-146deb0" data-id="146deb0" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-9396591 elementor-widget elementor-widget-heading" data-id="9396591" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">Validate and Verify </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-d2732ca elementor-widget elementor-widget-text-editor" data-id="d2732ca" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>What sets POSITIIVPLUS apart is its unique ability to turn vast amounts of unstructured data into useful insights. We meticulously verify this data through a multi-layered, real-time process that involves Natural Language Processing (NLP), Artificial Intelligence (AI), Machine Learning (ML), and highly skilled data experts.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-5a7d0ac elementor-section-full_width animated-slow elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="5a7d0ac" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeIn&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b412440" data-id="b412440" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-c8e3284 elementor-widget elementor-widget-image" data-id="c8e3284" data-element_type="widget" data-widget_type="image.default">
                     <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="150" height="79" src="./images/2023-09-Step-3Image_Step-.svg" class="attachment-thumbnail size-thumbnail wp-image-2792" alt="" /> </div>
                  </div>
               </div>
            </div>
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-014d46f" data-id="014d46f" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-05e17f9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="05e17f9" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-73df78e" data-id="73df78e" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-c47ac8c elementor-widget elementor-widget-heading" data-id="c47ac8c" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">STEP 3</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-92399d0" data-id="92399d0" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-145503c elementor-widget elementor-widget-heading" data-id="145503c" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">Maintain and Update </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-3e51497 elementor-widget elementor-widget-text-editor" data-id="3e51497" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>Go-to-market teams often struggle to access reliable data. POSITIIVPLUS ensures you always have access to up-to-date information. We regularly test, update &amp; closely watch over each data point. If we identify any changes, we swiftly make adjustments, additions or removals to ensure the information remains precise and tailored to your specific requirements.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-mg497p1 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="mg497p1" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c3b4893" data-id="c3b4893" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-5b54fb7 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="5b54fb7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-2823cb6" data-id="2823cb6" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-ac7455b elementor-widget elementor-widget-heading" data-id="ac7455b" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">Master the ever-changing business terrain with POSITIIVPLUS</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-f2bec8e elementor-widget elementor-widget-text-editor" data-id="f2bec8e" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>Our dynamic platform merges data and technology to link you with your ideal suppliers while seamlessly aligning your procurement and sustainability teams, creating an unbeatable powerhouse for revenue generation.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-8059a1b elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="8059a1b" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-c30ee36" data-id="c30ee36" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-7d55f63 elementor-widget elementor-widget-heading" data-id="7d55f63" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">Reveal</span> Valuable Insights</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-a4585ad elementor-widget elementor-widget-text-editor" data-id="a4585ad" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>Discover your future suppliers using up-to-the-minute insights supported by reliable data</p>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-59a1b65 elementor-position-top elementor-widget elementor-widget-image-box" data-id="59a1b65" data-element_type="widget" data-widget_type="image-box.default">
                                 <div class="elementor-widget-container">
                                    <style>
                                       /*! elementor - v3.15.0 - 20-08-2023 */
                                       .elementor-widget-image-box .elementor-image-box-content {
                                          width: 100%
                                       }

                                       @media (min-width:768px) {

                                          .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
                                          .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
                                             display: flex
                                          }

                                          .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
                                             text-align: right;
                                             flex-direction: row-reverse
                                          }

                                          .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper {
                                             text-align: left;
                                             flex-direction: row
                                          }

                                          .elementor-widget-image-box.elementor-position-top .elementor-image-box-img {
                                             margin: auto
                                          }

                                          .elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper {
                                             align-items: flex-start
                                          }

                                          .elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper {
                                             align-items: center
                                          }

                                          .elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper {
                                             align-items: flex-end
                                          }
                                       }

                                       @media (max-width:767px) {
                                          .elementor-widget-image-box .elementor-image-box-img {
                                             margin-left: auto !important;
                                             margin-right: auto !important;
                                             margin-bottom: 15px
                                          }
                                       }

                                       .elementor-widget-image-box .elementor-image-box-img {
                                          display: inline-block
                                       }

                                       .elementor-widget-image-box .elementor-image-box-title a {
                                          color: inherit
                                       }

                                       .elementor-widget-image-box .elementor-image-box-wrapper {
                                          text-align: center
                                       }

                                       .elementor-widget-image-box .elementor-image-box-description {
                                          margin: 0
                                       }
                                    </style>
                                    <div class="elementor-image-box-wrapper">
                                       <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="300" height="184" src="./images/2023-09-1Image_Master.svg" class="attachment-medium size-medium wp-image-3081" alt="" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-2af823b" data-id="2af823b" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-500f5f2 elementor-widget elementor-widget-heading" data-id="500f5f2" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">Connect</span> With Suppliers</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-234630b elementor-widget elementor-widget-text-editor" data-id="234630b" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>Unite your procurement and sustainability teams with suppliers across various domains using a unified platform</p>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-0c8c0e9 elementor-position-top elementor-widget elementor-widget-image-box" data-id="0c8c0e9" data-element_type="widget" data-widget_type="image-box.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                       <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="430" height="264" src="./images/2023-09-2Image_Master.svg" class="attachment-full size-full wp-image-3080" alt="" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-bb02b1d" data-id="bb02b1d" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-492e6f2 elementor-widget elementor-widget-heading" data-id="492e6f2" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">Accelerate</span> Your Success</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-c01bc06 elementor-widget elementor-widget-text-editor" data-id="c01bc06" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    <p>Expand your Go-To-Market (GTM) efforts, automate supplier outreach &amp; streamline your use of data &amp; technology</p>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-1f58e32 elementor-position-top elementor-widget elementor-widget-image-box" data-id="1f58e32" data-element_type="widget" data-widget_type="image-box.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-image-box-wrapper">
                                       <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="430" height="264" src="./images/2023-09-3Image_Master.svg" class="attachment-full size-full wp-image-3082" alt="" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-f4f4d4d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f4f4d4d" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2a84692" data-id="2a84692" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-7077d4c elementor-align-center elementor-widget__width-initial elementor-mobile-align-justify elementor-widget elementor-widget-button" data-id="7077d4c" data-element_type="widget" data-widget_type="button.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-md" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-chevron-right"></i> </span> <span class="elementor-button-text">Claim your Profile</span> </span> </a> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-182d5c5 elementor-section-full_width elementor-section-height-min-height elementor-section-height-default elementor-section-items-middle" data-id="182d5c5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cd876e5" data-id="cd876e5" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <section class="elementor-section elementor-inner-section elementor-element elementor-element-d31d1e0 elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d31d1e0" data-element_type="section">
                     <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-f25e21d" data-id="f25e21d" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-ae75211 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="ae75211" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-heading-title elementor-size-default">Your Roadmap to ESG Success & Business Expansion</div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-e244bff elementor-widget__width-initial elementor-widget elementor-widget-html" data-id="e244bff" data-element_type="widget" data-widget_type="html.default">
                                 <div class="elementor-widget-container">
                                    <!DOCTYPE html>
                                    <html>

                                    <head>
                                       <style>
                                          @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

                                          .hello-text {
                                             font-family: "Montserrat";
                                             font-size: 36px;
                                             color: white;
                                          }

                                          .hello-gradient {
                                             margin-left: -10px;
                                             margin-right: -10px;
                                             font-family: "Montserrat";
                                             font-weight: 500;
                                             background: linear-gradient(180deg, #EF8E41 26.14%, #DFFC7C 39.49%, #64C397 52.01%, #00AAE1 66.47%, #4766EA 79.55%);
                                             -webkit-background-clip: text;
                                             -webkit-text-fill-color: transparent;
                                             display: inline;
                                          }

                                          .parent-div {
                                             display: flex;
                                             justify-content: center;
                                          }
                                       </style>
                                    </head>

                                    <body>
                                       <div class="parent-div">
                                          <div class="hello-text"> <span>POSIT</span> <span class="hello-gradient">II</span> <span class="hello-text">VPLUS In Action</span> </div>
                                       </div>
                                    </body>

                                    </html>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-64fd08a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="64fd08a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-093d075" data-id="093d075" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-6d00ad7 elementor-widget elementor-widget-heading" data-id="6d00ad7" data-element_type="widget" data-widget_type="heading.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">360</span> growth tools</div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-1129cc5 elementor-widget elementor-widget-text-editor" data-id="1129cc5" data-element_type="widget" data-widget_type="text-editor.default">
                     <div class="elementor-widget-container">
                        <p>These six integrated tools within the POSITIIVPLUS platform synergistically bolster your company&#8217;s sustainability endeavors. By offering data-driven insights, robust risk management, and collaborative solutions, they pave the way for both green growth and business expansion.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="elementor-section elementor-top-section elementor-element elementor-element-cea30f4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="cea30f4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
         <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5aee035" data-id="5aee035" data-element_type="column">
               <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-2572f23 elementor-widget elementor-widget-eael-adv-tabs" data-id="2572f23" data-element_type="widget" data-widget_type="eael-adv-tabs.default">
                     <div class="elementor-widget-container">
                        <div id="eael-advance-tabs-2572f23" class="eael-advance-tabs eael-tabs-horizontal eael-tab-auto-active  active-caret-on" data-tabid="2572f23">
                           <div class="eael-tabs-nav">
                              <ul class="">
                                 <li id="green-marketplace" class="active-default eael-tab-item-trigger" aria-selected="true" data-tab="1" role="tab" tabindex="0" aria-controls="green-marketplace-tab" aria-expanded="false">
                                    <div class="eael-tab-title  title-after-icon">Green Marketplace</div>
                                 </li>
                                 <li id="risk-intelligence" class="inactive eael-tab-item-trigger" aria-selected="false" data-tab="2" role="tab" tabindex="-1" aria-controls="risk-intelligence-tab" aria-expanded="false"> <span class="eael-tab-title  title-after-icon">Risk Intelligence</span> </li>
                                 <li id="scope-3-navigator" class="inactive eael-tab-item-trigger" aria-selected="false" data-tab="3" role="tab" tabindex="-1" aria-controls="scope-3-navigator-tab" aria-expanded="false"> <span class="eael-tab-title  title-after-icon">Scope 3 Navigator</span> </li>
                                 <li id="reports-builder" class="inactive eael-tab-item-trigger" aria-selected="false" data-tab="4" role="tab" tabindex="-1" aria-controls="reports-builder-tab" aria-expanded="false"> <span class="eael-tab-title  title-after-icon">Reports Builder</span> </li>
                              </ul>
                           </div>
                           <div class="eael-tabs-content">
                              <div id="green-marketplace-tab" class="clearfix eael-tab-content-item active-default" data-title-link="green-marketplace-tab">
                                 <div data-elementor-type="section" data-elementor-id="4552" class="elementor elementor-4552">
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-68e8af93 elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="68e8af93" data-element_type="section">
                                       <div class="elementor-container elementor-column-gap-no">
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4c14d894" data-id="4c14d894" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-5ca170d0 elementor-invisible elementor-widget elementor-widget-image" data-id="5ca170d0" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="image.default">
                                                   <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="836" height="541" src="./images/2023-09-Green.svg" class="attachment-full size-full wp-image-3268" alt="" /> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4e475def" data-id="4e475def" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1f58d103 elementor-widget elementor-widget-ucaddon_list" data-id="1f58d103" data-element_type="widget" data-widget_type="ucaddon_list.default">
                                                   <div class="elementor-widget-container">
                                                      <!-- start List -->
                                                      <link id='font-awesome-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-all.min.css' type='text/css' rel='stylesheet'>
                                                      <link id='font-awesome-4-shim-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-v4-shims.css' type='text/css' rel='stylesheet'>
                                                      <style type="text/css">
                                                         /* widget: List */
                                                         #uc_list_elementor_1f58d103 {
                                                            display: grid;
                                                            position: relative;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item {
                                                            display: flex;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item-title {
                                                            display: flex;
                                                            align-items: center;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item-image img {
                                                            max-width: 100%;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item-text * {
                                                            margin-bottom: 0px;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item-index {
                                                            flex-grow: 0;
                                                            flex-shrink: 0;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            line-height: 1em;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item-index svg {
                                                            height: 1em;
                                                            width: 1em;
                                                         }

                                                         #uc_list_elementor_1f58d103 .ue-list-item-content {
                                                            flex-grow: 1;
                                                         }

                                                         .ue_badge {
                                                            font-size: 13px;
                                                         }
                                                      </style>
                                                      <div id="uc_list_elementor_1f58d103" class="ue-list uc-items-wrapper">
                                                         <div class="ue-list-item elementor-repeater-item-b3c62b9">
                                                            <div class="ue-list-item-index"> <i class='fas fa-square-full'></i> </div>
                                                            <div class="ue-list-item-content">
                                                               <div class="ue-list-item-title">Green Marketplace </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!-- end List -->
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-77dabf97 elementor-widget elementor-widget-text-editor" data-id="77dabf97" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>This tool is a comprehensive Green B2B Database<br /><br /></p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-432b614a elementor-widget elementor-widget-text-editor" data-id="432b614a" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>operating with a Green Credit System that connects you to a vast network of sustainable businesses, allowing you to explore potential partners, suppliers and customers.</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1fdcb41e elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="1fdcb41e" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Green Directory:</span> Comprehensive sustainability-focused database.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-17cf9ea8 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="17cf9ea8" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Supplier Insights:</span> Evaluate ESG Compliant suppliers.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-76df3963 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="76df3963" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Sustainable Sourcing:</span> Discover green procurement options.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1b28242 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="1b28242" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Eco-Certifications:</span> Verify ESG credentials.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-377b674d elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="377b674d" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Global Reach:</span> Access worldwide Green Business Network.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                              </div>
                              <div id="risk-intelligence-tab" class="clearfix eael-tab-content-item inactive" data-title-link="risk-intelligence-tab">
                                 <div data-elementor-type="section" data-elementor-id="2129" class="elementor elementor-2129">
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-1e3957a5 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1e3957a5" data-element_type="section">
                                       <div class="elementor-container elementor-column-gap-no">
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-18d3a02" data-id="18d3a02" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-4c76cb24 elementor-invisible elementor-widget elementor-widget-image" data-id="4c76cb24" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="image.default">
                                                   <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="836" height="541" src="./images/2023-09-2Image_Tool.svg" class="attachment-full size-full wp-image-3341" alt="" /> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2c89f92b" data-id="2c89f92b" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-16b91e7 elementor-widget elementor-widget-ucaddon_list" data-id="16b91e7" data-element_type="widget" data-widget_type="ucaddon_list.default">
                                                   <div class="elementor-widget-container">
                                                      <!-- start List -->
                                                      <link id='font-awesome-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-all.min.css' type='text/css' rel='stylesheet'>
                                                      <link id='font-awesome-4-shim-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-v4-shims.css' type='text/css' rel='stylesheet'>
                                                      <style type="text/css">
                                                         /* widget: List */
                                                         #uc_list_elementor_16b91e7 {
                                                            display: grid;
                                                            position: relative;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item {
                                                            display: flex;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item-title {
                                                            display: flex;
                                                            align-items: center;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item-image img {
                                                            max-width: 100%;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item-text * {
                                                            margin-bottom: 0px;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item-index {
                                                            flex-grow: 0;
                                                            flex-shrink: 0;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            line-height: 1em;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item-index svg {
                                                            height: 1em;
                                                            width: 1em;
                                                         }

                                                         #uc_list_elementor_16b91e7 .ue-list-item-content {
                                                            flex-grow: 1;
                                                         }

                                                         .ue_badge {
                                                            font-size: 13px;
                                                         }
                                                      </style>
                                                      <div id="uc_list_elementor_16b91e7" class="ue-list uc-items-wrapper">
                                                         <div class="ue-list-item elementor-repeater-item-b3c62b9">
                                                            <div class="ue-list-item-index"> <i class='fas fa-square-full'></i> </div>
                                                            <div class="ue-list-item-content">
                                                               <div class="ue-list-item-title">Risk Intelligence </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!-- end List -->
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-3bea204f elementor-widget elementor-widget-text-editor" data-id="3bea204f" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>This tool equips your business with the tools to assess and mitigate sustainability risks.</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-41f7cea elementor-widget elementor-widget-text-editor" data-id="41f7cea" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>It provides real-time Risk Assessment, suggests Mitigation Strategies, and sends Compliance Alerts to help you navigate the evolving landscape of environmental and social responsibilities.</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1a58b236 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-id="1a58b236" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Risk Assessment:</span> Identify sustainability risks.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6b1ea510 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="6b1ea510" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Market Insights:</span> Stay ahead of trends.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-32eaba4d elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="32eaba4d" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Compliance Tracking:</span> Monitor regulations.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6944e2e9 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="6944e2e9" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Predictive Analytics: </span>Anticipate challenges.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1c5ae2db elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="1c5ae2db" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Proactive Strategy: </span>Mitigate potential issues.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                              </div>
                              <div id="scope-3-navigator-tab" class="clearfix eael-tab-content-item inactive" data-title-link="scope-3-navigator-tab">
                                 <div data-elementor-type="section" data-elementor-id="4558" class="elementor elementor-4558">
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-179492a8 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="179492a8" data-element_type="section">
                                       <div class="elementor-container elementor-column-gap-no">
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6741fbb0" data-id="6741fbb0" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-5483bb5a elementor-invisible elementor-widget elementor-widget-image" data-id="5483bb5a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="image.default">
                                                   <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="836" height="541" src="./images/2023-09-3Image_Tool.png" class="attachment-full size-full wp-image-3343" alt="" /> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3f2b5692" data-id="3f2b5692" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-5dd043c2 elementor-widget elementor-widget-ucaddon_list" data-id="5dd043c2" data-element_type="widget" data-widget_type="ucaddon_list.default">
                                                   <div class="elementor-widget-container">
                                                      <!-- start List -->
                                                      <link id='font-awesome-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-all.min.css' type='text/css' rel='stylesheet'>
                                                      <link id='font-awesome-4-shim-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-v4-shims.css' type='text/css' rel='stylesheet'>
                                                      <style type="text/css">
                                                         /* widget: List */
                                                         #uc_list_elementor_5dd043c2 {
                                                            display: grid;
                                                            position: relative;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item {
                                                            display: flex;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item-title {
                                                            display: flex;
                                                            align-items: center;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item-image img {
                                                            max-width: 100%;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item-text * {
                                                            margin-bottom: 0px;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item-index {
                                                            flex-grow: 0;
                                                            flex-shrink: 0;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            line-height: 1em;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item-index svg {
                                                            height: 1em;
                                                            width: 1em;
                                                         }

                                                         #uc_list_elementor_5dd043c2 .ue-list-item-content {
                                                            flex-grow: 1;
                                                         }

                                                         .ue_badge {
                                                            font-size: 13px;
                                                         }
                                                      </style>
                                                      <div id="uc_list_elementor_5dd043c2" class="ue-list uc-items-wrapper">
                                                         <div class="ue-list-item elementor-repeater-item-b3c62b9">
                                                            <div class="ue-list-item-index"> <i class='fas fa-square-full'></i> </div>
                                                            <div class="ue-list-item-content">
                                                               <div class="ue-list-item-title">Scope 3 Navigator </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!-- end List -->
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1a2f69ed elementor-widget elementor-widget-text-editor" data-id="1a2f69ed" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>This tool focuses on reducing your company&#8217;s carbon footprint</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-44a2f69 elementor-widget elementor-widget-text-editor" data-id="44a2f69" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>by analyzing emissions across your supply chain. It offers valuable Supply Chain Insights and assists in developing effective Carbon Reduction Plans. This tool empowers you to take action and reduce your environmental impact.</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-62381d77 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-id="62381d77" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Emissions Tracking: </span>Measure carbon footprint.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-21476c8d elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="21476c8d" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Supply Chain Insights:</span> Analyze environmental impact.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1fea9312 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="1fea9312" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Carbon Reduction: </span> Identify reduction opportunities.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6fa12e5d elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="6fa12e5d" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Reporting Simplified:</span> Streamline GHG reporting.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-39da6e8a elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="39da6e8a" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;"> Sustainability Goals: </span>Align with Scope 3 targets.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                              </div>
                              <div id="reports-builder-tab" class="clearfix eael-tab-content-item inactive" data-title-link="reports-builder-tab">
                                 <div data-elementor-type="section" data-elementor-id="4564" class="elementor elementor-4564">
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-74788ed0 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="74788ed0" data-element_type="section">
                                       <div class="elementor-container elementor-column-gap-no">
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-256817f8" data-id="256817f8" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1ddd5568 elementor-invisible elementor-widget elementor-widget-image" data-id="1ddd5568" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="image.default">
                                                   <div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="836" height="541" src="./images/2023-09-4Image_Tool-1.png" class="attachment-full size-full wp-image-3700" alt="" /> </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-cf3969a" data-id="cf3969a" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-33c61f9c elementor-widget elementor-widget-ucaddon_list" data-id="33c61f9c" data-element_type="widget" data-widget_type="ucaddon_list.default">
                                                   <div class="elementor-widget-container">
                                                      <!-- start List -->
                                                      <link id='font-awesome-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-all.min.css' type='text/css' rel='stylesheet'>
                                                      <link id='font-awesome-4-shim-css' href='./css/unlimited-elements-for-elementor-assets_libraries-font-awesome5-css-fontawesome-v4-shims.css' type='text/css' rel='stylesheet'>
                                                      <style type="text/css">
                                                         /* widget: List */
                                                         #uc_list_elementor_33c61f9c {
                                                            display: grid;
                                                            position: relative;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item {
                                                            display: flex;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item-title {
                                                            display: flex;
                                                            align-items: center;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item-image img {
                                                            max-width: 100%;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item-text * {
                                                            margin-bottom: 0px;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item-index {
                                                            flex-grow: 0;
                                                            flex-shrink: 0;
                                                            display: flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            line-height: 1em;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item-index svg {
                                                            height: 1em;
                                                            width: 1em;
                                                         }

                                                         #uc_list_elementor_33c61f9c .ue-list-item-content {
                                                            flex-grow: 1;
                                                         }

                                                         .ue_badge {
                                                            font-size: 13px;
                                                         }
                                                      </style>
                                                      <div id="uc_list_elementor_33c61f9c" class="ue-list uc-items-wrapper">
                                                         <div class="ue-list-item elementor-repeater-item-b3c62b9">
                                                            <div class="ue-list-item-index"> <i class='fas fa-square-full'></i> </div>
                                                            <div class="ue-list-item-content">
                                                               <div class="ue-list-item-title">Report Builder </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!-- end List -->
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-67cb070b elementor-widget elementor-widget-text-editor" data-id="67cb070b" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p><span style="background-color: var(--ast-global-color-5); color: var(--ast-global-color-3);">This tool</span>&nbsp;allows you to create customized sustainability reports.</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-5aa87660 elementor-widget elementor-widget-text-editor" data-id="5aa87660" data-element_type="widget" data-widget_type="text-editor.default">
                                                   <div class="elementor-widget-container">
                                                      <p>It simplifies the process of presenting your data with user-friendly Data Visualization and highlights key Performance Metrics. Generate impactful reports to share your sustainability achievements and goals with stakeholders.</p>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-eb78940 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-id="eb78940" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Custom Reports: </span>Tailor data visualization.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-3edf886f elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="3edf886f" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Data Integration: </span>Combine multiple sources.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-721dd888 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="721dd888" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Real-time Dashboards: </span>Access live insights.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-95ebfc7 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="95ebfc7" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Export Options</span> : Share data easily.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="elementor-element elementor-element-30abc002 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="30abc002" data-element_type="widget" data-widget_type="image-box.default">
                                                   <div class="elementor-widget-container">
                                                      <div class="elementor-image-box-wrapper">
                                                         <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="23" height="22" src="./images/2023-09-icon-_tick.png" class="attachment-full size-full wp-image-3707" alt="" /></figure>
                                                         <div class="elementor-image-box-content">
                                                            <p class="elementor-image-box-description"><span style="color:#64C397;">Performance Analysis: </span> Evaluate sustainability efforts.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="elementor-element elementor-element-d6509e8 elementor-align-center elementor-widget elementor-widget-button" data-id="d6509e8" data-element_type="widget" data-widget_type="button.default">
                     <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-sm" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-chevron-right"></i> </span> <span class="elementor-button-text">create account</span> </span> </a> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <?php include('footer.php'); ?>
   <div data-elementor-type="popup" data-elementor-id="3983" class="elementor elementor-3983 elementor-location-popup" data-elementor-settings="{&quot;timing&quot;:[]}">
      <div class="elementor-element elementor-element-df9be03 e-con-full e-flex e-con" data-id="df9be03" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
         <div class="elementor-element elementor-element-ec6eeff elementor-widget elementor-widget-html" data-id="ec6eeff" data-element_type="widget" data-widget_type="html.default">
            <div class="elementor-widget-container">
               <!doctype html>
               <html lang="en">

               <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <title>Bootstrap demo</title>
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                  <style>
                     @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

                     * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                     }

                     body {
                        font-family: "Montserrat";
                        background-color: aliceblue;
                     }

                     .formbold-mb-3 {
                        margin-bottom: 15px;
                     }

                     .formbold-relative {
                        position: relative;
                     }

                     .formbold-opacity-0 {
                        opacity: 0;
                     }

                     .formbold-stroke-current {
                        stroke: currentColor;
                     }

                     #supportCheckbox:checked~div span {
                        opacity: 1;
                     }

                     .formbold-main-wrapper {
                        display: unset;
                        align-items: center;
                        justify-content: center;
                        padding: initial;
                     }

                     .formbold-form-select {
                        width: 100%;
                        padding: 12px 22px;
                        border-radius: 5px;
                        border: 1px solid #00AAE1;
                        background: #ffffff;
                        font-size: 16px;
                        color: #536387;
                        outline: none;
                        resize: none;
                     }

                     .formbold-main-wrapper {
                        display: unset;
                        align-items: center;
                        justify-content: center;
                        padding: initial;
                     }

                     .formbold-main-wrapper {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                     }

                     .formbold-form-wrapper {
                        margin: 0 auto;
                        max-width: 970px;
                        width: 100%;
                        background: white;
                        padding: 40px;
                     }

                     .formbold-img {
                        margin-bottom: 45px;
                     }

                     .formbold-form-title {
                        margin-bottom: 30px;
                     }

                     .formbold-form-title h2 {
                        font-weight: 600;
                        font-size: 28px;
                        line-height: 34px;
                        color: #07074d;
                     }

                     .formbold-form-title p {
                        font-size: 16px;
                        line-height: 24px;
                        color: #536387;
                        margin-top: 12px;
                     }

                     .formbold-input-flex {
                        display: flex;
                        gap: 20px;
                        margin-bottom: 15px;
                     }

                     .formbold-input-flex>div {
                        width: 50%;
                     }

                     .formbold-form-input {
                        text-align: left;
                        width: 90%;
                        padding: 13px 42px;
                        border-radius: 5px;
                        border: 1px solid #00AAE1;
                        background: #ffffff;
                        font-weight: 300;
                        font-size: 16px;
                        color: #536387;
                        outline: none;
                        resize: none;
                     }

                     .formbold-form-input:focus {
                        border-color: #00AAE1;
                        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                     }

                     .formbold-form-label {
                        color: #333333;
                        font-weight: 600;
                        line-height: 24px;
                        display: block;
                        margin-bottom: 10px;
                     }

                     .formbold-checkbox-label {
                        display: flex;
                        cursor: pointer;
                        user-select: none;
                        font-size: 16px;
                        line-height: 24px;
                        color: #536387;
                     }

                     .formbold-checkbox-label a {
                        margin-left: 5px;
                        color: #00AAE1;
                     }

                     .formbold-input-checkbox {
                        position: absolute;
                        width: 1px;
                        height: 1px;
                        padding: 0;
                        margin: -1px;
                        overflow: hidden;
                        clip: rect(0, 0, 0, 0);
                        white-space: nowrap;
                        border-width: 0;
                     }

                     .formbold-checkbox-inner {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 20px;
                        height: 20px;
                        margin-right: 16px;
                        margin-top: 2px;
                        border: 0.7px solid #00AAE1;
                        border-radius: 3px;
                     }

                     .formbold-btn {
                        font-size: 20px;
                        border-radius: 5px;
                        padding: 14px 25px;
                        border: none;
                        font-weight: 600;
                        background-color: #00AAE1;
                        color: white;
                        cursor: pointer;
                        margin-top: 36px;
                        margin-left: 20px;
                     }

                     .formbold-btn:hover {
                        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
                     }

                     /* Custom css */
                     #heading {
                        padding: 10px 0px;
                        font-size: 30px;
                        font-weight: 600;
                     }

                     #heading-text {
                        padding: 1px 0px;
                        font-size: 20px;
                        font-weight: 300;
                     }

                     @media (min-width: 276px) {
                        .formbold-form-input {
                           padding: 4px 10px;
                           font-size: 16px;
                        }

                        .formbold-form-label {
                           font-size: 12px;
                        }

                        #heading {
                           padding: 10px 0px;
                           font-size: 24px;
                           font-weight: 500;
                        }

                        #heading-text {
                           padding: 1px 0px;
                           font-size: 16px;
                           font-weight: 300;
                        }
                     }

                     @media (min-width: 576px) {
                        .formbold-form-input {
                           padding: 14px 12px;
                           font-size: 16px;
                        }

                        .formbold-form-label {
                           font-size: 16px;
                        }

                        #heading {
                           padding: 10px 0px;
                           font-size: 30px;
                           font-weight: 500;
                        }

                        #heading-text {
                           padding: 1px 0px;
                           font-size: 20px;
                           font-weight: 300;
                        }
                     }
                  </style>
               </head>

               <body>
                  <div class="formbold-main-wrapper">
                     <div class="formbold-form-wrapper">
                        <form action="https://formbold.com/s/9xGxk" method="POST">
                           <div class="formbold-input-group">
                              <div class="row">
                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="heading"> <span style="color:#64C397;">Connect </span>with us </div>
                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="heading-text">
                                    <p> Take the first step towards a sustainable future! Register now to redefine your business journey with purpose and impact. </p>
                                 </div>
                              </div>
                              <div class="row custom-input-field">
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="heading"> <label for="fullname" class="formbold-form-label"> Full Name </label> <input type="text" name="fullname" id="fullname" class="formbold-form-input form-validate" placeholder="Type here" required /> </div>
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="heading"> <label for="emails" class="formbold-form-label"> Email Address </label> <input type="email" name="email" id="emails" class="formbold-form-input" placeholder="Type here" required /> </div>
                              </div>
                              <div class="row custom-input-field">
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="heading"> <label for="Companyname" class="formbold-form-label"> Company/Organization Name </label> <input type="text" name="Companyname" id="Companyname" class="formbold-form-input form-validate" placeholder="Type here" required /> </div>
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="heading"> <label for="phone" class="formbold-form-label"> Contact No </label> <input id="phone" name="phone" type="text" pattern="^\d{3}\d{3}\d{4}$" placeholder="Type here" class="formbold-form-input form-validate" required /> </div>
                              </div>
                              <div class="row custom-input-field">
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="heading"> <label for="designation" class="formbold-form-label"> Your Designation </label> <input type="text" name="designation" id="designation" class="formbold-form-input form-validate" placeholder="Type here" required /> </div>
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="heading">
                                    <div class="div"> <button onclick="form_submit('#emails',1)" type="button" class="formbold-btn">Register Now <i class="fa-solid fa-chevron-right"></i></button></div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
               </body>

               </html>
            </div>
         </div>
      </div>
   </div>
   <link rel='stylesheet' id='elementor-post-4552-css' href='./css/elementor-css-post-4552.css' media='all' />
   <link rel='stylesheet' id='elementor-post-2129-css' href='./css/elementor-css-post-2129.css' media='all' />
   <link rel='stylesheet' id='elementor-post-4558-css' href='./css/elementor-css-post-4558.css' media='all' />
   <link rel='stylesheet' id='elementor-post-4564-css' href='./css/elementor-css-post-4564.css' media='all' />
   <link rel='stylesheet' id='elementor-post-3983-css' href='./css/elementor-css-post-3983.css' media='all' />
   <link rel='stylesheet' id='e-animations-css' href='./css/elementor-assets-lib-animations-animations.min.css' media='all' />
   <script id='astra-theme-js-js-extra'>
      var astra = {
         "break_point": "921",
         "isRtl": "",
         "is_scroll_to_id": "",
         "is_scroll_to_top": "",
         "is_header_footer_builder_active": "1"
      };
   </script>
   <script src='./js/astra-assets-js-minified-frontend.min.js' id='astra-theme-js-js'></script>
   <script defer src='./js/depicter-resources-scripts-player-depicter.js' id='depicter--player-js'></script>
   <script id='eael-general-js-extra'>
      var localize = {
         "ajaxurl": "https:\/\/positiivplus.com\/wordpress\/wp-admin\/admin-ajax.php",
         "nonce": "683d49d122",
         "i18n": {
            "added": "Added ",
            "compare": "Compare",
            "loading": "Loading..."
         },
         "eael_translate_text": {
            "required_text": "is a required field",
            "invalid_text": "Invalid",
            "billing_text": "Billing",
            "shipping_text": "Shipping",
            "fg_mfp_counter_text": "of"
         },
         "page_permalink": "https:\/\/positiivplus.com\/wordpress\/features\/",
         "cart_redirectition": "no",
         "cart_page_url": "",
         "el_breakpoints": {
            "mobile": {
               "label": "Mobile Portrait",
               "value": 767,
               "default_value": 767,
               "direction": "max",
               "is_enabled": true
            },
            "mobile_extra": {
               "label": "Mobile Landscape",
               "value": 880,
               "default_value": 880,
               "direction": "max",
               "is_enabled": false
            },
            "tablet": {
               "label": "Tablet Portrait",
               "value": 1024,
               "default_value": 1024,
               "direction": "max",
               "is_enabled": true
            },
            "tablet_extra": {
               "label": "Tablet Landscape",
               "value": 1200,
               "default_value": 1200,
               "direction": "max",
               "is_enabled": false
            },
            "laptop": {
               "label": "Laptop",
               "value": 1366,
               "default_value": 1366,
               "direction": "max",
               "is_enabled": false
            },
            "widescreen": {
               "label": "Widescreen",
               "value": 2400,
               "default_value": 2400,
               "direction": "min",
               "is_enabled": false
            }
         }
      };
   </script>
   <script src='./js/essential-addons-for-elementor-lite-assets-front-end-js-view-general.min.js' id='eael-general-js'></script>
   <script src='./js/essential-addons-elementor-eael-1450.js' id='eael-1450-js'></script>
   <script src='./js/header-footer-elementor-inc-js-frontend.js' id='hfe-frontend-js-js'></script>
   <script src='./js/elementor-pro-assets-js-webpack-pro.runtime.min.js' id='elementor-pro-webpack-runtime-js'></script>
   <script src='./js/elementor-assets-js-webpack.runtime.min.js' id='elementor-webpack-runtime-js'></script>
   <script src='./js/elementor-assets-js-frontend-modules.min.js' id='elementor-frontend-modules-js'></script>
   <script src='./js/dist-vendor-wp-polyfill-inert.min.js' id='wp-polyfill-inert-js'></script>
   <script src='./js/dist-vendor-regenerator-runtime.min.js' id='regenerator-runtime-js'></script>
   <script src='./js/dist-vendor-wp-polyfill.min.js' id='wp-polyfill-js'></script>
   <script src='./js/dist-hooks.min.js' id='wp-hooks-js'></script>
   <script src='./js/dist-i18n.min.js' id='wp-i18n-js'></script>
   <script id="wp-i18n-js-after">
      wp.i18n.setLocaleData({
         'text direction\u0004ltr': ['ltr']
      });
   </script>
   <script id="elementor-pro-frontend-js-before">
      var ElementorProFrontendConfig = {
         "ajaxurl": "https:\/\/positiivplus.com\/wordpress\/wp-admin\/admin-ajax.php",
         "nonce": "0c3dc776f4",
         "urls": {
            "assets": "https:\/\/positiivplus.com\/wordpress\/wp-content\/plugins\/elementor-pro\/assets\/",
            "rest": "https:\/\/positiivplus.com\/wordpress\/wp-json\/"
         },
         "shareButtonsNetworks": {
            "facebook": {
               "title": "Facebook",
               "has_counter": true
            },
            "twitter": {
               "title": "Twitter"
            },
            "linkedin": {
               "title": "LinkedIn",
               "has_counter": true
            },
            "pinterest": {
               "title": "Pinterest",
               "has_counter": true
            },
            "reddit": {
               "title": "Reddit",
               "has_counter": true
            },
            "vk": {
               "title": "VK",
               "has_counter": true
            },
            "odnoklassniki": {
               "title": "OK",
               "has_counter": true
            },
            "tumblr": {
               "title": "Tumblr"
            },
            "digg": {
               "title": "Digg"
            },
            "skype": {
               "title": "Skype"
            },
            "stumbleupon": {
               "title": "StumbleUpon",
               "has_counter": true
            },
            "mix": {
               "title": "Mix"
            },
            "telegram": {
               "title": "Telegram"
            },
            "pocket": {
               "title": "Pocket",
               "has_counter": true
            },
            "xing": {
               "title": "XING",
               "has_counter": true
            },
            "whatsapp": {
               "title": "WhatsApp"
            },
            "email": {
               "title": "Email"
            },
            "print": {
               "title": "Print"
            }
         },
         "facebook_sdk": {
            "lang": "en_US",
            "app_id": ""
         },
         "lottie": {
            "defaultAnimationUrl": "https:\/\/positiivplus.com\/wordpress\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"
         }
      };
   </script>
   <script src='./js/elementor-pro-assets-js-frontend.min.js' id='elementor-pro-frontend-js'></script>
   <script src='./js/elementor-assets-lib-waypoints-waypoints.min.js' id='elementor-waypoints-js'></script>
   <script src='./js/jquery-ui-core.min.js' id='jquery-ui-core-js'></script>
   <script id="elementor-frontend-js-before">
      var elementorFrontendConfig = {
         "environmentMode": {
            "edit": false,
            "wpPreview": false,
            "isScriptDebug": false
         },
         "i18n": {
            "shareOnFacebook": "Share on Facebook",
            "shareOnTwitter": "Share on Twitter",
            "pinIt": "Pin it",
            "download": "Download",
            "downloadImage": "Download image",
            "fullscreen": "Fullscreen",
            "zoom": "Zoom",
            "share": "Share",
            "playVideo": "Play Video",
            "previous": "Previous",
            "next": "Next",
            "close": "Close",
            "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
            "a11yCarouselPrevSlideMessage": "Previous slide",
            "a11yCarouselNextSlideMessage": "Next slide",
            "a11yCarouselFirstSlideMessage": "This is the first slide",
            "a11yCarouselLastSlideMessage": "This is the last slide",
            "a11yCarouselPaginationBulletMessage": "Go to slide"
         },
         "is_rtl": false,
         "breakpoints": {
            "xs": 0,
            "sm": 480,
            "md": 768,
            "lg": 1025,
            "xl": 1440,
            "xxl": 1600
         },
         "responsive": {
            "breakpoints": {
               "mobile": {
                  "label": "Mobile Portrait",
                  "value": 767,
                  "default_value": 767,
                  "direction": "max",
                  "is_enabled": true
               },
               "mobile_extra": {
                  "label": "Mobile Landscape",
                  "value": 880,
                  "default_value": 880,
                  "direction": "max",
                  "is_enabled": false
               },
               "tablet": {
                  "label": "Tablet Portrait",
                  "value": 1024,
                  "default_value": 1024,
                  "direction": "max",
                  "is_enabled": true
               },
               "tablet_extra": {
                  "label": "Tablet Landscape",
                  "value": 1200,
                  "default_value": 1200,
                  "direction": "max",
                  "is_enabled": false
               },
               "laptop": {
                  "label": "Laptop",
                  "value": 1366,
                  "default_value": 1366,
                  "direction": "max",
                  "is_enabled": false
               },
               "widescreen": {
                  "label": "Widescreen",
                  "value": 2400,
                  "default_value": 2400,
                  "direction": "min",
                  "is_enabled": false
               }
            }
         },
         "version": "3.15.3",
         "is_static": false,
         "experimentalFeatures": {
            "e_dom_optimization": true,
            "e_optimized_assets_loading": true,
            "e_optimized_css_loading": true,
            "additional_custom_breakpoints": true,
            "container": true,
            "e_swiper_latest": true,
            "container_grid": true,
            "theme_builder_v2": true,
            "landing-pages": true,
            "nested-elements": true,
            "e_global_styleguide": true,
            "page-transitions": true,
            "notes": true,
            "form-submissions": true,
            "e_scroll_snap": true
         },
         "urls": {
            "assets": "https:\/\/positiivplus.com\/wordpress\/wp-content\/plugins\/elementor\/assets\/"
         },
         "swiperClass": "swiper",
         "settings": {
            "page": [],
            "editorPreferences": []
         },
         "kit": {
            "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
            "global_image_lightbox": "yes",
            "lightbox_enable_counter": "yes",
            "lightbox_enable_fullscreen": "yes",
            "lightbox_enable_zoom": "yes",
            "lightbox_enable_share": "yes",
            "lightbox_title_src": "title",
            "lightbox_description_src": "description"
         },
         "post": {
            "id": 1450,
            "title": "Features%20%E2%80%93%20PositiivPlus",
            "excerpt": "",
            "featuredImage": false
         }
      };
   </script>
   <script src='./js/elementor-assets-js-frontend.min.js' id='elementor-frontend-js'></script>
   <script src='./js/elementor-pro-assets-js-elements-handlers.min.js' id='pro-elements-handlers-js'></script>
   <script src='./js/elementor-pro-assets-lib-sticky-jquery.sticky.min.js' id='e-sticky-js'></script>
   <script src='./js/qkd-underscore.min.js' id='underscore-js'></script>
   <script id='wp-util-js-extra'>
      var _wpUtilSettings = {
         "ajax": {
            "url": "\/wordpress\/wp-admin\/admin-ajax.php"
         }
      };
   </script>
   <script src='./js/qqm-wp-util.min.js' id='wp-util-js'></script>
   <script id='wpforms-elementor-js-extra'>
      var wpformsElementorVars = {
         "captcha_provider": "recaptcha",
         "recaptcha_type": "v2"
      };
   </script>
   <script src='./js/wpforms-lite-assets-js-integrations-elementor-frontend.min.js' id='wpforms-elementor-js'></script> <!--   Unlimited Elements 1.5.83 Scripts -->
   <script type='text/javascript' id='unlimited-elements-scripts'>
      /* List scripts: */



      jQuery(document).ready(function() {

         var obj_uelist = jQuery('#uc_list_elementor_1f58d103');


         if (obj_uelist.hasClass("uc-remote-parent") == false)
            return (false);

         var objRemoteOptions = {
            class_items: "ue-list-item",
            class_active: "ue_list_active",
            selector_item_trigger: null,
            add_set_active_code: true
         };

         obj_uelist.data("uc-remote-options", objRemoteOptions);

         obj_uelist.trigger("uc-object-ready");
         jQuery("body").trigger("uc-remote-parent-init", [obj_uelist]);


      });

      /* List scripts: */



      jQuery(document).ready(function() {

         var obj_uelist = jQuery('#uc_list_elementor_16b91e7');


         if (obj_uelist.hasClass("uc-remote-parent") == false)
            return (false);

         var objRemoteOptions = {
            class_items: "ue-list-item",
            class_active: "ue_list_active",
            selector_item_trigger: null,
            add_set_active_code: true
         };

         obj_uelist.data("uc-remote-options", objRemoteOptions);

         obj_uelist.trigger("uc-object-ready");
         jQuery("body").trigger("uc-remote-parent-init", [obj_uelist]);


      });

      /* List scripts: */



      jQuery(document).ready(function() {

         var obj_uelist = jQuery('#uc_list_elementor_5dd043c2');


         if (obj_uelist.hasClass("uc-remote-parent") == false)
            return (false);

         var objRemoteOptions = {
            class_items: "ue-list-item",
            class_active: "ue_list_active",
            selector_item_trigger: null,
            add_set_active_code: true
         };

         obj_uelist.data("uc-remote-options", objRemoteOptions);

         obj_uelist.trigger("uc-object-ready");
         jQuery("body").trigger("uc-remote-parent-init", [obj_uelist]);


      });

      /* List scripts: */



      jQuery(document).ready(function() {

         var obj_uelist = jQuery('#uc_list_elementor_33c61f9c');


         if (obj_uelist.hasClass("uc-remote-parent") == false)
            return (false);

         var objRemoteOptions = {
            class_items: "ue-list-item",
            class_active: "ue_list_active",
            selector_item_trigger: null,
            add_set_active_code: true
         };

         obj_uelist.data("uc-remote-options", objRemoteOptions);

         obj_uelist.trigger("uc-object-ready");
         jQuery("body").trigger("uc-remote-parent-init", [obj_uelist]);


      });
   </script>
   <script>
      /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
         var t, e = location.hash.substring(1);
         /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
      }, !1);
   </script>
</body>

</html>