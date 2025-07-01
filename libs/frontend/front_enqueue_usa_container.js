// console && console.log("front_enqueue_js.js is loaded from usavc")

// This name is defined automatically (InlineShortcodeView_you, for Frontend editor only
window.InlineShortcodeView_usa_container = window.InlineShortcodeView.extend({
  // Render called every time when some of attributes changed.
  render: function () {
    // console && console.log("InlineShortcodeView_usa_container: render called.")
    window.InlineShortcodeView_usa_container.__super__.render.call(this) // it is recommended to call parent method to avoid new versions problems.

    // var $i = this.$el.find("canvas")
    // console.log("Render")
    // console.log($i)
    // console.log(this)
    // There is a place where you can implement logic for rendering / element param changing and all other javascript logic what you can imagine.
    // this.myCustomMethodToDebugShortcode()

    return this
  },
  /*
   * Show shortcode mapped parameters
   */
  myCustomMethodToDebugShortcode: function () {
    var $i = this.model.settings // shortcode settings from VC_MAP! also available in global variable "vc_mapper"
    var str = ""
    _.each(
      $i,
      function (settings, key) {
        var obj = {}
        obj[key] = settings
        str += JSON.stringify(obj) + "<br>"
      },
      this
    )
    // console.log(this.$el.attr("class"))
    // jQuery('<div>Green background will be visible only in fronteditor mode and css is stored in assets/front_enqueue_iframe_css.css <br/><br/> This json styled info was created "on the fly" from available settings: <br/>' + str + "</div>").appendTo(this.$el)
  },

  bsaColorOpacity: function (color, percent) {
    //            Example Lighten:
    //            shadeColor("#63C6FF",40);
    //
    //            Example Darken:
    //            shadeColor("#63C6FF",-40);

    var R = parseInt(color.substring(1, 3), 16)
    var G = parseInt(color.substring(3, 5), 16)
    var B = parseInt(color.substring(5, 7), 16)

    R = parseInt((R * (100 + percent)) / 100)
    G = parseInt((G * (100 + percent)) / 100)
    B = parseInt((B * (100 + percent)) / 100)

    R = R < 255 ? R : 255
    G = G < 255 ? G : 255
    B = B < 255 ? B : 255

    var RR = R.toString(16).length == 1 ? "0" + R.toString(16) : R.toString(16)
    var GG = G.toString(16).length == 1 ? "0" + G.toString(16) : G.toString(16)
    var BB = B.toString(16).length == 1 ? "0" + B.toString(16) : B.toString(16)

    return "#" + RR + GG + BB
  },

  generate_dynamic_css: function ($accordion_id, accordionData) {
    var $unique_acc_id = "#" + $accordion_id.attr("id"),
      $acc_title_bar = ".theme-custom-title-bar",
      $acc_active_title_bar = ".theme-custom-title-active",
      dyna_css_string = ""

    dyna_css_string += $unique_acc_id + " " + $acc_title_bar + "{background: " + accordionData.title_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_title_bar + " a {color: " + accordionData.title_text_color + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_title_bar + " a:after {background: " + accordionData.nav_box_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_title_bar + " a:before {background: " + accordionData.nav_box_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_title_bar + " a:hover {color: " + accordionData.title_text_color + " !important;}"
    dyna_css_string += $unique_acc_id + " " + $acc_title_bar + " a:hover:before {background: " + accordionData.nav_box_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_active_title_bar + " {background: " + this.bsaColorOpacity(accordionData.title_active_bg, 15) + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_active_title_bar + " a {color: " + accordionData.title_active_text_color + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_active_title_bar + " a:after {background: " + accordionData.nav_active_box_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_active_title_bar + " a:before {background: " + accordionData.nav_active_box_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_active_title_bar + " a:hover {color: " + accordionData.title_active_text_color + " !important;} "
    dyna_css_string += $unique_acc_id + " " + $acc_active_title_bar + " a:hover:before {background: " + accordionData.nav_active_box_bg + " !important;} "
    dyna_css_string += $unique_acc_id + " div" + $acc_active_title_bar + " { background: #FFFFFF !important;} "
    dyna_css_string += $unique_acc_id + " .custom_theme_nav a.active_page { background: " + accordionData.title_bg + " !important; color: " + accordionData.title_text_color + " !important;} "
    // console.log(data)
    jQuery("<style>" + dyna_css_string + "</style>").prependTo(this.$el)

    // jQuery("<style>body{margin-top: 100px;}</style>").appendTo(this.$el)
  },

  updated: function () {
    // console && console.log("InlineShortcodeView_usa_container: updated called.")
    window.InlineShortcodeView_usa_container.__super__.updated.call(this)

    // console.log(this.$el.find(".bwl_acc_container").length)

    // console.log(this.$el.find(".bwl_acc_container").attr("id"))

    // var $accordion_id = $("#" + $(this).attr("id")),
    var $accordion_id = this.$el.find(".bwl_acc_container"),
      $bsa_search = $accordion_id.data("search"),
      $bsa_theme = $accordion_id.data("theme"),
      $bsa_title_bg = $accordion_id.data("title_bg"),
      $bsa_title_text_color = $accordion_id.data("title_text_color"),
      $bsa_nav_box_bg = $accordion_id.data("nav_box_bg"),
      $bsa_title_active_bg = $accordion_id.data("title_active_bg"),
      $bsa_title_active_text_color = $accordion_id.data("title_active_text_color"),
      $bsa_nav_active_box_bg = $accordion_id.data("nav_active_box_bg"),
      $bsa_animate = $accordion_id.data("animate"),
      $bsa_rtl = $accordion_id.data("rtl"),
      $bsa_msg_item_found = $accordion_id.data("msg_item_found"),
      $bsa_msg_no_result = $accordion_id.data("msg_no_result"),
      $bsa_ctrl_btn = $accordion_id.data("ctrl_btn"),
      $bsa_toggle = $accordion_id.data("toggle"),
      $bsa_closeall = $accordion_id.data("closeall"),
      $bsa_item_opened = $accordion_id.data("item_opened"),
      $bsa_nav_box = $accordion_id.data("nav_box"),
      $bsa_nav_icon = $accordion_id.data("nav_icon"),
      $bsa_highlight_bg = $accordion_id.data("highlight_bg"),
      $bsa_highlight_color = $accordion_id.data("highlight_color"),
      $bsa_content_bg = $accordion_id.data("content_bg"),
      $bsa_content_text_color = $accordion_id.data("content_text_color"),
      $bsa_content_link_color = $accordion_id.data("content_link_color"),
      $bsa_content_link_hover_color = $accordion_id.data("content_link_hover_color"),
      $bsa_pagination = $accordion_id.data("pagination"),
      $bsa_limit = $accordion_id.data("limit"),
      $bsa_suggestion_box = $accordion_id.data("suggestion_box"),
      $bsa_sbox_title = $accordion_id.data("sbox_title"),
      $bsa_sbox_keywords = $accordion_id.data("sbox_keywords"),
      $bsa_placeholder = $accordion_id.data("placeholder"),
      $bsa_nav_right = $accordion_id.data("nav_right"),
      $bsa_query_string = $accordion_id.data("query_string")

    // return true

    const accordionData = {
      search: $bsa_search,
      theme: $bsa_theme,
      title_bg: $bsa_title_bg,
      title_text_color: $bsa_title_text_color,
      nav_box_bg: $bsa_nav_box_bg,
      title_active_bg: $bsa_title_active_bg,
      title_active_text_color: $bsa_title_active_text_color,
      nav_active_box_bg: $bsa_nav_active_box_bg,
      animation: $bsa_animate,
      rtl: $bsa_rtl,
      msg_item_found: $bsa_msg_item_found,
      msg_no_result: $bsa_msg_no_result,
      ctrl_btn: $bsa_ctrl_btn,
      toggle: $bsa_toggle,
      closeall: $bsa_closeall,
      item_opened: $bsa_item_opened,
      nav_box: $bsa_nav_box,
      nav_icon: $bsa_nav_icon,
      highlight_bg: $bsa_highlight_bg,
      highlight_color: $bsa_highlight_color,
      content_bg: $bsa_content_bg,
      content_text_color: $bsa_content_text_color,
      content_link_color: $bsa_content_link_color,
      content_link_hover_color: $bsa_content_link_hover_color,
      placeholder: $bsa_placeholder,
      pagination: $bsa_pagination, // pagination status.
      suggestion_box: $bsa_suggestion_box, // pagination status.
      sbox_title: $bsa_sbox_title, // pagination status.
      sbox_keywords: $bsa_sbox_keywords, // pagination status.
      limit: $bsa_limit, // item per page.
      class: $bsa_nav_right,
      query_string: $bsa_query_string,
    }
    // console.log(accordionData)

    // Generate On the fly CSS.
    this.generate_dynamic_css($accordion_id, accordionData)

    // Removed extra search box.
    if (jQuery($accordion_id).find(".accordion_search_container").length > 1) {
      jQuery($accordion_id).find(".accordion_search_container:not(:first-child)").remove()
    }

    // Removed extra search result container
    if (jQuery($accordion_id).find(".search_result_container").length > 1) {
      jQuery($accordion_id).find(".search_result_container:not(:first-child)").remove()
    }

    // Removed extra container.
    if (jQuery($accordion_id).find(".vc_container-anchor").length > 0) {
      jQuery($accordion_id).find(".vc_container-anchor").remove()
    }

    // Removed extra container.
    if (jQuery($accordion_id).find(".acc-ctrl-btn").length > 0) {
      jQuery($accordion_id).find(".acc-ctrl-btn").remove()
    }

    // Remove extra pagination
    if (jQuery($accordion_id).find(".bsa_page_navigation").length > 1) {
      jQuery($accordion_id).find(".bsa_page_navigation:not(:first-child)").remove()
    }

    // Removed acc_container Style Tag.
    // if (jQuery($accordion_id).find(".acc_container").length > 0) {
    //   jQuery($accordion_id).find(".acc_container").attr("style", "display:none")
    // }

    // Accordion Navigation.
    let themNavBox = accordionData.nav_box != "" ? "nav_" + accordionData.nav_box : ""

    jQuery($accordion_id)
      .find(".acc_title_bar")
      .attr("class", "")
      .addClass("acc_title_bar " + accordionData.theme + "-bar " + themNavBox + "")

    // Regenerate accordion.

    $accordion_id.bwlAccordion(accordionData)

    // Unbind Click Events.
    jQuery($accordion_id).find(".acc_title_bar").unbind("click")

    // console.log(window.vc.frame_window)
    // jQuery("<style>body{margin-top: 100px;}</style>").appendTo(this.$el)

    // This is example how you can re-render pieChart Doughnut in frontend editor.
    // var $i = this.$el.find("canvas")
    // console.log($i)
    // window.vc.frame_window.TestElementRender($i)
  },
  parentChanged: function () {
    // console && console.log("InlineShortcodeView_test_element: parentChanged called.")
    window.InlineShortcodeView_usa_container.__super__.parentChanged.call(this)
  },
  // Available other methods too, see in InlineShortcodeView model (file: js_composer/assets/js/frontend_editor/frontend_editor.js
})
