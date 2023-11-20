<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<title>plan page &#8211; PositiivPlus</title>
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
	<link rel='stylesheet' id='elementor-icons-css' href='./css/elementor-assets-lib-eicons-css-elementor-icons.min.css' media='all' />
	<link rel='stylesheet' id='elementor-frontend-css' href='./css/elementor-assets-css-frontend-lite.min.css' media='all' />
	<link rel='stylesheet' id='swiper-css' href='./css/elementor-assets-lib-swiper-v8-css-swiper.min.css' media='all' />
	<link rel='stylesheet' id='elementor-post-442-css' href='./css/elementor-css-post-442.css' media='all' />
	<link rel='stylesheet' id='lae-animate-css' href='./css/addons-for-elementor-assets-css-lib-animate.css' media='all' />
	<link rel='stylesheet' id='lae-sliders-styles-css' href='./css/addons-for-elementor-assets-css-lib-sliders.min.css' media='all' />
	<link rel='stylesheet' id='lae-icomoon-styles-css' href='./css/addons-for-elementor-assets-css-icomoon.css' media='all' />
	<link rel='stylesheet' id='lae-frontend-styles-css' href='./css/addons-for-elementor-assets-css-lae-frontend.css' media='all' />
	<link rel='stylesheet' id='lae-grid-styles-css' href='./css/addons-for-elementor-assets-css-lae-grid.css' media='all' />
	<link rel='stylesheet' id='lae-widgets-styles-css' href='./css/addons-for-elementor-assets-css-widgets-lae-widgets.min.css' media='all' />
	<link rel='stylesheet' id='elementor-pro-css' href='./css/elementor-pro-assets-css-frontend-lite.min.css' media='all' />
	<link rel='stylesheet' id='elementor-post-1573-css' href='./css/elementor-css-post-1573.css' media='all' />
	<link rel='stylesheet' id='hfe-widgets-style-css' href='./css/header-footer-elementor-inc-widgets-css-frontend.css' media='all' />
	<link rel='stylesheet' id='elementor-post-976-css' href='./css/elementor-css-post-976.css' media='all' />
	<link rel='stylesheet' id='elementor-post-990-css' href='./css/elementor-css-post-990.css' media='all' />
	<link rel='stylesheet' id='eael-general-css' href='./css/essential-addons-for-elementor-lite-assets-front-end-css-view-general.min.css' media='all' />
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
	<link rel="alternate" type="application/json" href="https://positiivplus.com/wordpress/wp-json/wp/v2/pages/1573" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://positiivplus.com/wordpress/xmlrpc.php?rsd" />
	<meta name="generator" content="WordPress 6.3.1" />
	<link rel="canonical" href="https://positiivplus.com/wordpress/plans/" />
	<link rel='shortlink' href='https://positiivplus.com/wordpress/?p=1573' />
	<link rel="alternate" type="application/json+oembed" href="https://positiivplus.com/wordpress/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpositiivplus.com%2Fwordpress%2Fplans%2F" />
	<link rel="alternate" type="text/xml+oembed" href="https://positiivplus.com/wordpress/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpositiivplus.com%2Fwordpress%2Fplans%2F&#038;format=xml" />
	<script type="text/javascript">
		(function() {
			window.lae_fs = {
				can_use_premium_code: false
			};
		})();
	</script>
	<meta name="generator" content="Elementor 3.15.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
	<style id="uagb-style-frontend-1573">
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

<body class="page-template page-template-elementor_canvas page page-id-1573 ehf-header ehf-footer ehf-template-astra ehf-stylesheet-astra ast-desktop ast-separate-container ast-two-container ast-no-sidebar astra-4.2.1 ast-single-post ast-replace-site-logo-transparent ast-inherit-site-logo-transparent ast-hfb-header elementor-default elementor-template-canvas elementor-kit-442 elementor-page elementor-page-1573">
	<?php include('header.php'); ?>
	<div data-elementor-type="wp-page" data-elementor-id="1573" class="elementor elementor-1573">
		<section class="elementor-section elementor-top-section elementor-element elementor-element-3a45f39 elementor-section-full_width elementor-section-height-full elementor-section-height-default elementor-section-items-middle" data-id="3a45f39" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-875b98f" data-id="875b98f" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-95b1cfe elementor-widget elementor-widget-heading" data-id="95b1cfe" data-element_type="widget" data-widget_type="heading.default" style="padding-top:100px;">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-default"><span style="color:#64C397;">Choose </span> a plan </div>
							</div>
						</div>
						<div class="elementor-element elementor-element-8354232 elementor-widget elementor-widget-heading" data-id="8354232" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-default">for your business</div>
							</div>
						</div>
						<div class="elementor-element elementor-element-3460184 elementor-widget elementor-widget-text-editor" data-id="3460184" data-element_type="widget" data-widget_type="text-editor.default">
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
								<p>Select from our three distinct plans tailored to suit your business needs and harness our premium features to elevate your organization&#8217;s growth.</p>
							</div>
						</div>
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-be51d06 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="be51d06" data-element_type="section">
							<div class="elementor-container elementor-column-gap-default">
								<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-b947983 custom" data-id="b947983" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-a36d84c elementor-widget elementor-widget-image" data-id="a36d84c" data-element_type="widget" data-widget_type="image.default">
											<div class="elementor-widget-container"> <img decoding="async" width="56" height="66" src="./images/2023-09-1Icon_Plan-1.svg" class="attachment-large size-large wp-image-3359" alt="" /> </div>
										</div>
										<div class="elementor-element elementor-element-9096311 borderr elementor-widget elementor-widget-heading" data-id="9096311" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">Registered</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-63d640a borderr elementor-widget elementor-widget-heading" data-id="63d640a" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">After claiming the Eco Profile</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-6f688e2 borderr elementor-widget elementor-widget-text-editor" data-id="6f688e2" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p>A registered account means the company has taken the first step towards sustainability by claiming its Eco Profile. It signifies the company&#8217;s intent to become environmentally and socially responsible.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-f3d692d custom" data-id="f3d692d" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-a789734 elementor-widget elementor-widget-image" data-id="a789734" data-element_type="widget" data-widget_type="image.default">
											<div class="elementor-widget-container"> <img decoding="async" width="56" height="66" src="./images/2023-09-2Icon_Plan-1.svg" class="attachment-large size-large wp-image-3437" alt="" /> </div>
										</div>
										<div class="elementor-element elementor-element-c9c4733 borderr elementor-widget elementor-widget-heading" data-id="c9c4733" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">VERIFIED </div>
											</div>
										</div>
										<div class="elementor-element elementor-element-ec03c10 borderr elementor-widget elementor-widget-heading" data-id="ec03c10" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">Achieved after obtaining a Verified Eco Profile</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-cb77afd borderr elementor-widget elementor-widget-text-editor" data-id="cb77afd" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p>Companies with a verified account have demonstrated their commitment to sustainability by providing concrete evidence. This status boosts the company&#8217;s credibility and transparency for business expansion.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-31afb00 custom" data-id="31afb00" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-6ae3b54 elementor-widget elementor-widget-image" data-id="6ae3b54" data-element_type="widget" data-widget_type="image.default">
											<div class="elementor-widget-container"> <img decoding="async" width="56" height="66" src="./images/2023-09-3Icon_Plan-1.svg" class="attachment-large size-large wp-image-3438" alt="" /> </div>
										</div>
										<div class="elementor-element elementor-element-6235c67 borderr elementor-widget elementor-widget-heading" data-id="6235c67" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">ADVANCED </div>
											</div>
										</div>
										<div class="elementor-element elementor-element-623534d borderr elementor-widget elementor-widget-heading" data-id="623534d" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">Access to advanced tools and features</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-65ab96c borderr elementor-widget elementor-widget-text-editor" data-id="65ab96c" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p>An advanced account represents a company that has unlocked additional features and tools, such as the POSITIIVPLUS 360 Growth Tools. These tools are designed to help ESG-compliant businesses achieve sustainability and business growth.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<div class="elementor-element elementor-element-399a5d1 elementor-align-center elementor-widget elementor-widget-button" data-id="399a5d1" data-element_type="widget" data-widget_type="button.default">
							<div class="elementor-widget-container">
								<div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-sm" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-angle-right"></i> </span> <span class="elementor-button-text">contact us</span> </span> </a> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="elementor-section elementor-top-section elementor-element elementor-element-ad308b6 elementor-section-full_width elementor-section-height-min-height elementor-section-height-default elementor-section-items-middle" data-id="ad308b6" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9ddc674" data-id="9ddc674" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-9e2fe15 elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="9e2fe15" data-element_type="section">
							<div class="elementor-container elementor-column-gap-default">
								<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-60eeaa6" data-id="60eeaa6" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-b49bf29 elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-widget elementor-widget-heading" data-id="b49bf29" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">Connect, Collaborate & Cultivate with</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-e1d4ec6 elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-widget elementor-widget-heading" data-id="e1d4ec6" data-element_type="widget" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<div class="elementor-heading-title elementor-size-default">POSITIIVPLUS ESG Business Network</div>
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
		<header class="elementor-section elementor-top-section elementor-element elementor-element-a787b3f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a787b3f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-no">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f3664e6" data-id="f3664e6" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-bed687d elementor-widget-tablet__width-initial elementor-widget elementor-widget-heading" data-id="bed687d" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-large">Our <strong style=color:#64C397>Benefits</strong> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section class="elementor-section elementor-top-section elementor-element elementor-element-0f1c5b3 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="0f1c5b3" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-46b0e50" data-id="46b0e50" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-3bb62c4 elementor-widget elementor-widget-html" data-id="3bb62c4" data-element_type="widget" data-widget_type="html.default">
							<div class="elementor-widget-container">
								<html>

								<head>
									<meta charset="UTF-8">
									<title>Pricing Table</title>
									<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
									<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
									<!-- <link rel="stylesheet" href="css/reset.css"> -->
									<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
									<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
									</script>
									<style>
										@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

										body {
											background: #fff;
											font-family: "Montserrat";
											font: 400 1em/1.4;
											color: #333;
											text-align: center;
										}

										h1 {
											font-weight: 300;
											font-size: 5em;
											line-height: 1.35;
											margin: 0 0 .125em;
										}

										h1+p {
											font-size: 1.5em;
											color: #999;
											max-width: 30em;
											margin: 0 auto 3em;
										}

										table {
											width: 100%;
											text-align: left;
											border-spacing: 0;
											border-collapse: collapse;
											-webkit-box-sizing: border-box;
											-moz-box-sizing: border-box;
											box-sizing: border-box;
										}

										th,
										td {
											white-space: inherit !important;
											font-family: inherit;
											font-size: .875em;
											line-height: 1.45;
											color: #444;
											vertical-align: middle;
											padding: .7em;
											border: 1px solid #FFD7B7 !important;
										}

										th {
											font-weight: 600;
										}

										colgroup:nth-child(1) {
											width: 28%;
											border: 1px solid #ccc;
										}

										colgroup:nth-child(2) {
											width: 18%;
											border: 1px solid #ccc;
										}

										colgroup:nth-child(3) {
											width: 18%;
											border: 1px solid #ccc;
										}

										colgroup:nth-child(4) {
											width: 18%;
											border: 1px solid #ccc;
											/* border: 3px solid #59c7fb; */
										}

										colgroup:nth-child(5) {
											width: 18%;
											border: 1px solid #ccc;
										}

										/* Tablehead */
										thead th {
											background: white;
											text-align: center;
											padding-left: 4% !important;
											position: relative;
											border-bottom: 1px solid #ccc;
											font-weight: 400;
											color: #0a0303;
											white-space: inherit !important;
										}

										thead th:nth-child(1) {
											background: transparent;
										}

										.heading {
											font-family: Montserrat;
											font-size: 2em;
											font-weight: 400;
										}

										.feature-heading {
											font-family: Montserrat;
											font-size: 2em;
											font-weight: 400;
											text-align: left;
											padding-left: 4%;
										}

										thead th h2 {
											font-weight: bold;
											line-height: 1.2;
											/* color: #e5e6e2; */
										}

										thead th h2+p {
											font-size: 1.5em;
											line-height: 1.4;
											color: #e5e6e2;
										}

										thead th:nth-child(3) h2 {
											font-size: 3.6em;
										}

										thead th:nth-child(3) h2+p {
											font-size: 1.5em;
										}

										/* Tablebody */
										tbody th {
											font-family: Montserrat;
											font-size: 0.995em;
											font-weight: 400;
											padding-left: 4% !important;
											color: #333333;
											background: rgba(255, 255, 255, 0.42);
											border-left: 1px solid #ccc;
										}

										@media (min-width: 276px) {
											tbody th {
												padding-left: 25px !important;
												color: #333333;
											}

											thead th {
												padding-left: 25px !important;
											}

											.th {
												white-space: inherit !important;
											}
										}

										@media (min-width: 576px) {
											.th {
												white-space: inherit !important;
											}

											tbody th {
												padding-left: 25px !important;
												color: #333333;
											}

											thead th {
												padding-left: 25px !important;
											}
										}

										/* // Medium devices (tablets, 768px and up) */
										@media (min-width: 768px) {
											tbody th {
												padding-left: 4% !important;
												color: #333333;
											}
										}

										/* // Large devices (desktops, 992px and up) */
										@media (min-width: 992px) {
											tbody th {
												padding-left: 4% !important;
											}
										}

										/* // X-Large devices (large desktops, 1200px and up) */
										@media (min-width: 1200px) {
											tbody th {
												padding-left: 4% !important;
											}
										}

										/* // XX-Large devices (larger desktops, 1400px and up) */
										@media (min-width: 1400px) {
											tbody th {
												padding-left: 4% !important;
											}
										}

										tbody th span {
											font-weight: normal;
											font-size: 87.5%;
											color: #999;
											display: block;
										}

										tbody td {
											background: rgba(255, 255, 255, 0.42);
											text-align: center;
											border-right: 1px solid #ccc;
										}

										tbody tr:nth-child(even) th,
										tbody tr:nth-child(even) td {
											background: rgba(245, 245, 245, 0.68);
											border: 1px solid #FFD7B7 !important;
											border-width: 1px 1px 1px 1px;
										}

										tbody tr:last-child td {
											border: 1px solid #ccc;
										}

										/* Tablefooter */
										tfoot th {
											padding: 2em 1em;
											border-top: 1px solid #ccc;
										}

										tfoot td {
											text-align: center;
											padding: 2em 1em;
											border-top: 1px solid #ccc;
											border-bottom: 1px solid #ccc;
											border-right: 1px solid #ccc;
										}

										tfoot a {
											font-weight: bold;
											color: #fff;
											text-decoration: none;
											text-transform: uppercase;
											display: block;
											padding: 1.125em 2em;
											background: #92c500;
											border-radius: .5em;
											font-size: 13px;
										}

										/* .fa-check {              color: green;          } */
										.fa-times {
											color: #dc2b2b;
										}

										a:focus,
										a:hover {
											color: #23527c;
											text-decoration: none;
										}
									</style>
								</head>

								<body>
									<div class="container">
										<div class="row">
											<div class="table-responsive">
												<table class="table">
													<colgroup></colgroup>
													<colgroup></colgroup>
													<colgroup></colgroup>
													<colgroup></colgroup>
													<thead>
														<tr>
															<th>
																<div class="feature-heading">Our Features</div>
															</th>
															<th>
																<div class="heading">Starter</div>
															</th>
															<th>
																<div class="heading">Business</div>
															</th>
															<th>
																<div class="heading">Enterprise</div>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th>Tool Access</th>
															<td>Restricted Dashboard Access</td>
															<td> Limited Dashboard & Platform Access </td>
															<td> Unlimited Dashboard & Platform Access </td>
														</tr>
														<tr>
															<th>ESG Data Validation System</th>
															<td><i class="fa-solid fa-check"></i></td>
															<td><i class="fa-solid fa-check"></i></td>
															<td><i class="fa-solid fa-check"></i></td>
															<!-- <td><i class="fa-solid fa-xmark"></i></td> -->
														</tr>
														<tr>
															<th>Boundary Settings for Sites</th>
															<td>5</td>
															<td>Unlimited</td>
															<td>Custom</td>
														</tr>
														<tr>
															<th>Boundary Settings For Products</th>
															<td>10</td>
															<td>Unlimited</td>
															<td>Custom</td>
														</tr>
														<tr>
															<th>Boundary Settings For Projects</th>
															<td>2</td>
															<td>Unlimited</td>
															<td>Custom</td>
														</tr>
														<tr>
															<th>GHG Accountinng Scope 1 Calculator</th>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<!-- another 6 -->
														<tr>
															<th>GHG Accountinng Scope 2 Calculator</th>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>GHG Accountinng Scope 3 Calculator</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Report Builder</th>
															<td>Single CSR Standard</td>
															<td>Single CSR Standard + Add-on Reporting Standards</td>
															<td>Custom Standardized Reporting</td>
														</tr>
														<tr>
															<th>Training Hub</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Document Library</th>
															<td>Limited Access</td>
															<td>Unlimited Access</td>
															<td>Unlimited Access</td>
															<!-- <td><i class="fa fa-check fa-2x"></i></td> -->
														</tr>
														<tr>
															<th>Action Center</th>
															<td> Resolution of Concerns and Corrective Actions, Checklists, Limited Internal Inspections & Audits </td>
															<td>Resolution of Concerns and Corrective Actions, Checklists, Unlimited Inspections & Audits, Issue Reporting</td>
															<td>Resolution of Concerns and Corrective Actions, Industry specific Checklists, Unlimited Organizational level Inspections & Audits, Issue Reporting and Management cycles, Workforce Training & Webinars</td>
														</tr>
														<!-- another 6 -->
														<tr>
															<th>Concern-Correction Action Cycles</th>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Issue Manager<br> (Observation_Grievance-Incident Cycle)</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Account Manager</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Assisted advisory & consultancy services</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Assisted advisory & consultancy services</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>POSITTIVPLUS Organization Profile</th>
															<td> <i class="fa-solid fa-xmark"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
															<td> <i class="fa-solid fa-check"></i></td>
														</tr>
														<tr>
															<th>Pricing Plans</th>
															<td>$250 per month for a single user</td>
															<td>$1000 per month for 5 users</td>
															<td>Custom Pricing</td>
														</tr>
														<tr>
															<th>Advanced Pricing Plans for Add-on Users</th>
															<td><i class="fa-solid fa-xmark"></i></td>
															<td>Add-on Users $25 Per User per month</td>
															<td>Add-on Users $55 Per User per month</td>
														</tr>
														<tr>
															<th>Additional Features</th>
															<td><i class="fa-solid fa-xmark"></i></td>
															<td>Sustainable Actions & Responsibility, Issue Reporting, Personalized Footprint Calculation</td>
															<td>Pro-Active Sustainable Actions & Responsibility, Issue Reporting & Solving, Personalized Footprint Calculation & Reduction</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</body>

								</html>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="elementor-section elementor-top-section elementor-element elementor-element-a3276a8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a3276a8" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-20b1419" data-id="20b1419" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-90e0a35 elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="90e0a35" data-element_type="section">
							<div class="elementor-container elementor-column-gap-default">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-194f86d" data-id="194f86d" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-41a6b5f elementor-widget elementor-widget-text-editor" data-id="41a6b5f" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p>Unlock unparalleled growth opportunities for your organization by harnessing the full power of our feature-rich tool POSITIIVPLUS</p>
											</div>
										</div>
									</div>
								</div>
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-df4b6cb" data-id="df4b6cb" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-d721d6d elementor-align-center elementor-widget elementor-widget-button" data-id="d721d6d" data-element_type="widget" data-widget_type="button.default">
											<div class="elementor-widget-container">
												<div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-sm" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-text">choose your plan</span> </span> </a> </div>
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
		<section class="elementor-section elementor-top-section elementor-element elementor-element-c5ac25e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c5ac25e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-87f32d0" data-id="87f32d0" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-a31b3bc elementor-widget elementor-widget-heading" data-id="a31b3bc" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-default">What our Clients are saying</div>
							</div>
						</div>
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-3d99283 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3d99283" data-element_type="section">
							<div class="elementor-container elementor-column-gap-default">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-c268a8b" data-id="c268a8b" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-eb93222 elementor-widget elementor-widget-image" data-id="eb93222" data-element_type="widget" data-widget_type="image.default">
											<div class="elementor-widget-container"> <img decoding="async" loading="lazy" width="617" height="367" src="./images/2023-09-image-89.png" class="attachment-large size-large wp-image-2198" alt="" /> </div>
										</div>
									</div>
								</div>
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-512c06f" data-id="512c06f" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-a942d82 elementor-position-left elementor-mobile-position-left elementor-vertical-align-middle elementor-view-default elementor-widget elementor-widget-icon-box" data-id="a942d82" data-element_type="widget" data-widget_type="icon-box.default">
											<div class="elementor-widget-container">
												<div class="elementor-icon-box-wrapper">
													<div class="elementor-icon-box-icon"> <span class="elementor-icon elementor-animation-"> <i aria-hidden="true" class="fas fa-square"></i> </span> </div>
													<div class="elementor-icon-box-content">
														<h3 class="elementor-icon-box-title"> <span> Client says </span> </h3>
													</div>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-fc76b20 elementor-widget elementor-widget-text-editor" data-id="fc76b20" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p>POSITIIVPLUS has been a game-changer for our company&#8217;s sustainability journey. The platform&#8217;s data-driven insights helped us identify untapped market opportunities, leading to a significant increase in our market share. The green database within POSITIIVPLUS has also allowed us to forge valuable partnerships and learn from like-minded organizations. Thanks to POSITIIVPLUS, we&#8217;ve not only improved our ESG performance but also achieved remarkable growth and impact in the sustainability sector.</p>
											</div>
										</div>
										<div class="elementor-element elementor-element-bf6f290 elementor-widget elementor-widget-text-editor" data-id="bf6f290" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p>-Ledor</p>
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
		<section class="elementor-section elementor-top-section elementor-element elementor-element-3420d32 elementor-section-full_width elementor-section-height-min-height elementor-section-height-default elementor-section-items-middle" data-id="3420d32" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-24a69b3" data-id="24a69b3" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-74d1639 elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-widget elementor-widget-heading" data-id="74d1639" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-default">Are you in need of custom solutions for your business?</div>
							</div>
						</div>
						<div class="elementor-element elementor-element-bdb93a6 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="bdb93a6" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-default">If your business deals with a high volume of transactions, our experts can help you choose the right product, along with custom pricing.</div>
							</div>
						</div>
						<div class="elementor-element elementor-element-f04d646 elementor-align-left elementor-mobile-align-center elementor-hidden-mobile elementor-widget elementor-widget-button" data-id="f04d646" data-element_type="widget" data-widget_type="button.default">
							<div class="elementor-widget-container">
								<div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-xs" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-chevron-right"></i> </span> <span class="elementor-button-text">Contact sales</span> </span> </a> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="elementor-section elementor-top-section elementor-element elementor-element-27ae8de elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="27ae8de" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-bc14aa5" data-id="bc14aa5" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-7c1ba21 elementor-widget elementor-widget-heading" data-id="7c1ba21" data-element_type="widget" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<div class="elementor-heading-title elementor-size-default"><strong style=color:#64C397>Frequently</strong> Asked<br> Questions </div>
							</div>
						</div>
						<div class="elementor-element elementor-element-3a10c70 elementor-widget elementor-widget-text-editor" data-id="3a10c70" data-element_type="widget" data-widget_type="text-editor.default">
							<div class="elementor-widget-container">
								<p>Dummy Smart businesses today embrace transparent sustainability and effective communication, driving positive stakeholder impact. With our B2B Cloud-based SaaS tool POSITIIVPLUS that does your work for you, it’s a practical possibility to become pro- planet.</p>
							</div>
						</div>
						<div class="elementor-element elementor-element-b98513c elementor-align-left elementor-widget elementor-widget-button" data-id="b98513c" data-element_type="widget" data-widget_type="button.default">
							<div class="elementor-widget-container">
								<div class="elementor-button-wrapper"> <a class="elementor-button elementor-button-link elementor-size-sm" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM5ODMiLCJ0b2dnbGUiOmZhbHNlfQ%3D%3D"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-angle-right"></i> </span> <span class="elementor-button-text">contact us</span> </span> </a> </div>
							</div>
						</div>
					</div>
				</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-050792e" data-id="050792e" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-a990adb elementor-widget elementor-widget-accordion" data-id="a990adb" data-element_type="widget" data-widget_type="accordion.default">
							<div class="elementor-widget-container">
								<style>
									/*! elementor - v3.15.0 - 20-08-2023 */
									.elementor-accordion {
										text-align: left
									}

									.elementor-accordion .elementor-accordion-item {
										border: 1px solid #d5d8dc
									}

									.elementor-accordion .elementor-accordion-item+.elementor-accordion-item {
										border-top: none
									}

									.elementor-accordion .elementor-tab-title {
										margin: 0;
										padding: 15px 20px;
										font-weight: 700;
										line-height: 1;
										cursor: pointer;
										outline: none
									}

									.elementor-accordion .elementor-tab-title .elementor-accordion-icon {
										display: inline-block;
										width: 1.5em
									}

									.elementor-accordion .elementor-tab-title .elementor-accordion-icon svg {
										width: 1em;
										height: 1em
									}

									.elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-right {
										float: right;
										text-align: right
									}

									.elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-left {
										float: left;
										text-align: left
									}

									.elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-closed {
										display: block
									}

									.elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-opened,
									.elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-closed {
										display: none
									}

									.elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-opened {
										display: block
									}

									.elementor-accordion .elementor-tab-content {
										display: none;
										padding: 15px 20px;
										border-top: 1px solid #d5d8dc
									}

									@media (max-width:767px) {
										.elementor-accordion .elementor-tab-title {
											padding: 12px 15px
										}

										.elementor-accordion .elementor-tab-title .elementor-accordion-icon {
											width: 1.2em
										}

										.elementor-accordion .elementor-tab-content {
											padding: 7px 15px
										}
									}

									.e-con-inner>.elementor-widget-accordion,
									.e-con>.elementor-widget-accordion {
										width: var(--container-widget-width);
										--flex-grow: var(--container-widget-flex-grow)
									}
								</style>
								<div class="elementor-accordion">
									<div class="elementor-accordion-item">
										<div id="elementor-tab-title-1771" class="elementor-tab-title" data-tab="1" role="button" aria-controls="elementor-tab-content-1771" aria-expanded="false"> <a class="elementor-accordion-title" tabindex="0">Why are the digital sustainable services of POSITIIVPLUS different from other B2B cloud-based SaaS tools in the market?</a> </div>
										<div id="elementor-tab-content-1771" class="elementor-tab-content elementor-clearfix" data-tab="1" role="region" aria-labelledby="elementor-tab-title-1771">
											<p>POSITIIVPLUS does not provide temporary solutions. Our solutions are self-sustaining &amp; all-inclusive and have a data ridden bottom-up approach.</p>
										</div>
									</div>
									<div class="elementor-accordion-item">
										<div id="elementor-tab-title-1772" class="elementor-tab-title" data-tab="2" role="button" aria-controls="elementor-tab-content-1772" aria-expanded="false"> <a class="elementor-accordion-title" tabindex="0">What is POSITIIVPLUS, and how does it work?</a> </div>
										<div id="elementor-tab-content-1772" class="elementor-tab-content elementor-clearfix" data-tab="2" role="region" aria-labelledby="elementor-tab-title-1772">
											<p>POSITIIVPLUS is a B2B Cloud-based SaaS platform designed to help businesses integrate ESG practices seamlessly. It provides tools and resources for sustainable transformation and offers a network for growth within sustainability-focused markets.</p>
										</div>
									</div>
									<div class="elementor-accordion-item">
										<div id="elementor-tab-title-1773" class="elementor-tab-title" data-tab="3" role="button" aria-controls="elementor-tab-content-1773" aria-expanded="false"> <a class="elementor-accordion-title" tabindex="0">How can POSITIIVPLUS help my business access growth opportunities?</a> </div>
										<div id="elementor-tab-content-1773" class="elementor-tab-content elementor-clearfix" data-tab="3" role="region" aria-labelledby="elementor-tab-title-1773">
											<p>POSITIIVPLUS connects you with a green database, a growing business network in sustainability sectors that helps you tap into emerging opportunities, strengthen market positioning, and potentially increase profitability.</p>
										</div>
									</div>
									<div class="elementor-accordion-item">
										<div id="elementor-tab-title-1774" class="elementor-tab-title" data-tab="4" role="button" aria-controls="elementor-tab-content-1774" aria-expanded="false"> <a class="elementor-accordion-title" tabindex="0">Is POSITIIVPLUS suitable for small businesses and startups?</a> </div>
										<div id="elementor-tab-content-1774" class="elementor-tab-content elementor-clearfix" data-tab="4" role="region" aria-labelledby="elementor-tab-title-1774">
											<p>Yes, POSITIIVPLUS is designed to cater to businesses of all sizes, offering scalable solutions to meet the unique needs of each organization.</p>
										</div>
									</div>
									<div class="elementor-accordion-item">
										<div id="elementor-tab-title-1775" class="elementor-tab-title" data-tab="5" role="button" aria-controls="elementor-tab-content-1775" aria-expanded="false"> <a class="elementor-accordion-title" tabindex="0">What industries can benefit from using POSITIIVPLUS?</a> </div>
										<div id="elementor-tab-content-1775" class="elementor-tab-content elementor-clearfix" data-tab="5" role="region" aria-labelledby="elementor-tab-title-1775">
											<p>POSITIIVPLUS is adaptable to various industries, including finance, manufacturing, technology, and more, making it suitable for a wide range of businesses.</p>
										</div>
									</div>
									<div class="elementor-accordion-item">
										<div id="elementor-tab-title-1776" class="elementor-tab-title" data-tab="6" role="button" aria-controls="elementor-tab-content-1776" aria-expanded="false"> <a class="elementor-accordion-title" tabindex="0">How do I get started with POSITIIVPLUS?</a> </div>
										<div id="elementor-tab-content-1776" class="elementor-tab-content elementor-clearfix" data-tab="6" role="region" aria-labelledby="elementor-tab-title-1776">
											<p>To begin your journey with POSITIIVPLUS, simply visit our website, book a demo call with us, sign up for an account, and our onboarding process will guide you through the setup and customization of your sustainable transformation plan.</p>
										</div>
									</div>
								</div>
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
	<link rel='stylesheet' id='elementor-post-3983-css' href='./css/elementor-css-post-3983.css' media='all' />
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
			"page_permalink": "https:\/\/positiivplus.com\/wordpress\/plans\/",
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
				"id": 1573,
				"title": "plan%20page%20%E2%80%93%20PositiivPlus",
				"excerpt": "",
				"featuredImage": false
			}
		};
	</script>
	<script src='./js/elementor-assets-js-frontend.min.js' id='elementor-frontend-js'></script>
	<script src='./js/elementor-pro-assets-js-elements-handlers.min.js' id='pro-elements-handlers-js'></script>
	<script src='./js/elementor-pro-assets-lib-sticky-jquery.sticky.min.js' id='e-sticky-js'></script>
	<script src='./js/r4f-underscore.min.js' id='underscore-js'></script>
	<script id='wp-util-js-extra'>
		var _wpUtilSettings = {
			"ajax": {
				"url": "\/wordpress\/wp-admin\/admin-ajax.php"
			}
		};
	</script>
	<script src='./js/oe4-wp-util.min.js' id='wp-util-js'></script>
	<script id='wpforms-elementor-js-extra'>
		var wpformsElementorVars = {
			"captcha_provider": "recaptcha",
			"recaptcha_type": "v2"
		};
	</script>
	<script src='./js/wpforms-lite-assets-js-integrations-elementor-frontend.min.js' id='wpforms-elementor-js'></script>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
			var t, e = location.hash.substring(1);
			/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
		}, !1);
	</script>
</body>

</html>