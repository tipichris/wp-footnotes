/*!
 * This file is part of WP-Footnotes a plugin for WordPress
 * Copyright (C) 2007-2013 Simon Elvery
 */
(function(t){function e(){var e,o="<strong>Example:</strong> A sentence with a footnote",n=t("#list_style_type").val();"decimal"===n&&(e="4"),"decimal-leading-zero"===n&&(e="04"),"lower-alpha"===n&&(e="d"),"upper-alpha"===n&&(e="D"),"lower-roman"===n&&(e="iv"),"upper-roman"===n&&(e="IV"),"symbol"===n&&(e=t("#list_style_symbol").val()),i=i||t('<div id="wp-footnotes-identifier-example">').appendTo("#wp-footnotes-identifier-options"),t("#superscript").is(":checked")&&(o+="<sup>"),o+=t("#pre_identifier").val()+'<a href="javascript:;">',o+=t("#inner_pre_identifier").val(),o+=e,o+=t("#inner_post_identifier").val()+"</a>",o+=t("#post_identifier").val(),t("#superscript").is(":checked")&&(o+="</sup>"),i.html(o+".")}var i;t(function(){t("#list_style_type").change(function(){"symbol"===t(this).val()?t("#list_style_symbol_container").slideDown():t("#list_style_symbol_container").slideUp()}).change(),t("#pre_identifier,#inner_pre_identifier,#inner_post_identifier,#post_identifier,#list_style_symbol").on("keyup",e),t("#list_style_type").on("change",e),t("#superscript").on("click change",e),e(),t(".toggle-section").click(function(){var e=t(this);return t(e.attr("href")).slideToggle(),e.text("show"===e.text()?"hide":"show"),!1})})})(jQuery);