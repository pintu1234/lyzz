(window["aioseopjsonp"]=window["aioseopjsonp"]||[]).push([["tools-DatabaseTools-vue"],{2853:function(s,t,e){"use strict";var o=e("5c24"),i=e.n(o);i.a},"5c24":function(s,t,e){},e6b1:function(s,t,e){"use strict";e.r(t);var o=function(){var s=this,t=s.$createElement,e=s._self._c||t;return e("div",{staticClass:"aioseo-tools-database-tools"},[e("core-card",{attrs:{slug:"databaseTools","header-text":s.strings.resetRestoreSettings}},[e("core-settings-row",{attrs:{name:s.strings.selectSettings},scopedSlots:s._u([{key:"content",fn:function(){return[s.showSuccess?e("core-alert",{staticClass:"reset-success",attrs:{type:"green"}},[s._v(" "+s._s(s.strings.resetSuccess)+" ")]):s._e(),e("div",{staticClass:"reset-settings"},[s._v(" "+s._s(s.strings.selectSettingsToReset)+" "),e("br"),e("br"),e("grid-row",{staticClass:"settings"},[e("grid-column",[e("base-checkbox",{attrs:{size:"medium"},model:{value:s.options.all,callback:function(t){s.$set(s.options,"all",t)},expression:"options.all"}},[s._v(" "+s._s(s.strings.allSettings)+" ")])],1),s._l(s.settings,(function(t,o){return e("grid-column",{key:o,attrs:{xl:"3",md:"4",sm:"6"}},[s.options.all?s._e():e("base-checkbox",{attrs:{size:"medium"},model:{value:s.options[t.value],callback:function(e){s.$set(s.options,t.value,e)},expression:"options[setting.value]"}},[s._v(" "+s._s(t.label)+" ")]),"all"!==t.value&&s.options.all?e("base-checkbox",{attrs:{size:"medium",value:!0,disabled:""}},[s._v(" "+s._s(t.label)+" ")]):s._e()],1)}))],2),e("base-button",{attrs:{type:"gray",size:"medium",disabled:s.canReset},on:{click:function(t){s.showModal=!0}}},[s._v(" "+s._s(s.strings.resetSelectedSettings)+" ")])],1)]},proxy:!0}])})],1),s.showLogs?e("core-card",{attrs:{slug:"databaseToolsLogs","header-text":s.strings.logs},scopedSlots:s._u([{key:"tooltip",fn:function(){return[s._v(" "+s._s(s.strings.logsTooltip)+" ")]},proxy:!0}],null,!1,3934548655)},[s.$aioseo.data.logSizes.logs404?e("core-settings-row",{attrs:{name:s.strings.logs404,align:""},scopedSlots:s._u([{key:"content",fn:function(){return[e("base-button",{staticClass:"clear-log",attrs:{type:"gray",size:"medium",loading:"logs404"===s.loadingLog,disabled:s.disabledLog("logs404")},on:{click:function(t){return s.processClearLog("logs404")}}},[s.disabledLog("logs404")?e("span",[e("svg-checkmark"),s._v(" "+s._s(s.strings.cleared)+" ")],1):s._e(),s.disabledLog("logs404")?s._e():e("span",[s._v(" "+s._s(s.strings.clear404Logs)+" ")])]),e("div",{staticClass:"log-size"},[e("span",{staticClass:"size-dot",class:s.getSizeClass(s.$aioseo.data.logSizes.logs404.original)}),s._v(" "+s._s(s.$aioseo.data.logSizes.logs404.readable)+" ")])]},proxy:!0}],null,!1,1716809233)}):s._e(),s.$aioseo.data.logSizes.redirectLogs?e("core-settings-row",{attrs:{name:s.strings.redirectLogs,align:""},scopedSlots:s._u([{key:"content",fn:function(){return[e("base-button",{staticClass:"clear-log",attrs:{type:"gray",size:"medium",loading:"redirectLogs"===s.loadingLog,disabled:s.disabledLog("redirectLogs")},on:{click:function(t){return s.processClearLog("redirectLogs")}}},[s.disabledLog("redirectLogs")?e("span",[e("svg-checkmark"),s._v(" "+s._s(s.strings.cleared)+" ")],1):s._e(),s.disabledLog("redirectLogs")?s._e():e("span",[s._v(" "+s._s(s.strings.clearRedirectLogs)+" ")])]),e("div",{staticClass:"log-size"},[e("span",{staticClass:"size-dot",class:s.getSizeClass(s.$aioseo.data.logSizes.redirectLogs.original)}),s._v(" "+s._s(s.$aioseo.data.logSizes.redirectLogs.readable)+" ")])]},proxy:!0}],null,!1,4167017073)}):s._e(),s.showBadBotBlockerLogs?e("core-settings-row",{attrs:{name:s.strings.badBotBlockerLogs,align:""},scopedSlots:s._u([{key:"content",fn:function(){return[e("base-button",{staticClass:"clear-log",attrs:{type:"gray",size:"medium",loading:"badBotBlockerLog"===s.loadingLog,disabled:s.disabledLog("badBotBlockerLog")},on:{click:function(t){return s.processClearLog("badBotBlockerLog")}}},[s.disabledLog("badBotBlockerLog")?e("span",[e("svg-checkmark"),s._v(" "+s._s(s.strings.cleared)+" ")],1):s._e(),s.disabledLog("badBotBlockerLog")?s._e():e("span",[s._v(" "+s._s(s.strings.clearBadBotBlockerLogs)+" ")])]),e("div",{staticClass:"log-size"},[e("span",{staticClass:"size-dot",class:s.getSizeClass(s.$aioseo.data.logSizes.badBotBlockerLog.original)}),s._v(" "+s._s(s.$aioseo.data.logSizes.badBotBlockerLog.readable)+" ")])]},proxy:!0}],null,!1,649968002)}):s._e()],1):s._e(),s.showModal?e("core-modal",{attrs:{"no-header":""},scopedSlots:s._u([{key:"body",fn:function(){return[e("div",{staticClass:"aioseo-modal-body"},[e("button",{staticClass:"close",on:{click:function(t){t.stopPropagation(),s.showModal=!1}}},[e("svg-close",{on:{click:function(t){s.showModal=!1}}})],1),e("h3",[s._v(s._s(s.strings.areYouSureReset))]),e("div",{staticClass:"reset-description",domProps:{innerHTML:s._s(s.strings.actionCannotBeUndone)}}),e("base-button",{attrs:{type:"blue",size:"medium",loading:s.loading},on:{click:s.processResetSettings}},[s._v(" "+s._s(s.strings.yesIHaveBackup)+" ")]),e("base-button",{attrs:{type:"gray",size:"medium"},on:{click:function(t){s.showModal=!1}}},[s._v(" "+s._s(s.strings.noBackup)+" ")])],1)]},proxy:!0}],null,!1,2298756748)}):s._e()],1)},i=[],a=(e("4de4"),e("7db0"),e("4160"),e("caad"),e("45fc"),e("b64b"),e("2532"),e("159b"),e("5530")),n=e("2f62"),l={data:function(){return{clearedLogs:{badBotBlockerLogs:!1,redirectLogs:!1,logs404:!1},showModal:!1,loading:!1,loadingLog:null,showSuccess:!1,options:{},strings:{resetRestoreSettings:this.$t.__("Reset / Restore Settings",this.$td),selectSettings:this.$t.__("Select Settings",this.$td),selectSettingsToReset:this.$t.__("Select settings that you would like to reset:",this.$td),resetSelectedSettings:this.$t.__("Reset Selected Settings to Default",this.$td),resetSuccess:this.$t.__("Your settings have been reset successfully!",this.$td),areYouSureReset:this.$t.__("Are you sure you want to reset the selected settings to default?",this.$td),actionCannotBeUndone:this.$t.sprintf(this.$t.__("This action cannot be undone. Before taking this action, we recommend that you make a %1$sfull website backup first%2$s.",this.$td),"<strong>","</strong>"),yesIHaveBackup:this.$t.__("Yes, I have a backup and want to reset the settings",this.$td),noBackup:this.$t.__("No, I need to make a backup",this.$td),logs:this.$t.__("Logs",this.$td),badBotBlockerLogs:this.$t.__("Bad Bot Blocker Logs",this.$td),cleared:this.$t.__("Cleared",this.$td),clearBadBotBlockerLogs:this.$t.__("Clear Bad Bot Blocker Logs",this.$td),logs404:this.$t.__("404 Logs",this.$td),clear404Logs:this.$t.__("Clear 404 Logs",this.$td),redirectLogs:this.$t.__("Redirect Logs",this.$td),clearRedirectLogs:this.$t.__("Clear Redirect Logs",this.$td),allSettings:this.$t.sprintf(this.$t.__("All %1$s Settings",this.$td),"AIOSEO"),logsTooltip:this.$t.__('Log sizes may fluctuate and not always be 100% accurate since the results can be cached. Also after clearing a log, it may not show as "0" since database tables also include additional information such as indexes that we don\'t clear.',this.$td)}}},computed:Object(a["a"])(Object(a["a"])(Object(a["a"])({},Object(n["c"])(["isUnlicensed"])),Object(n["e"])(["addons"])),{},{settings:function(){var s=[{value:"webmaster-tools",label:this.$t.__("Webmaster Tools",this.$td)},{value:"rss-content",label:this.$t.__("RSS Content",this.$td)},{value:"advanced",label:this.$t.__("Advanced",this.$td)},{value:"search-appearance",label:this.$t.__("Search Appearance",this.$td)},{value:"social-networks",label:this.$t.__("Social Networks",this.$td)},{value:"sitemaps",label:this.$t.__("Sitemaps",this.$td)},{value:"robots-txt",label:this.$t.__("Robots.txt",this.$td)}];return window.aioseo.internalOptions.internal.deprecatedOptions.includes("badBotBlocker")&&s.push({value:"bad-bot-blocker",label:this.$t.__("Bad Bot Blocker",this.$td)}),this.$isPro&&s.push({value:"access-control",label:this.$t.__("Access Control",this.$td)}),!this.isUnlicensed&&this.showImageSeoReset&&s.push({value:"image-seo",label:this.$t.__("Image SEO",this.$td)}),!this.isUnlicensed&&this.showLocalBusinessReset&&s.push({value:"local-business-seo",label:this.$t.__("Local Business SEO",this.$td)}),!this.isUnlicensed&&this.showRedirectsReset&&s.push({value:"redirects",label:this.$t.__("Redirects",this.$td)}),s},showImageSeoReset:function(){var s=this.addons.find((function(s){return"aioseo-image-seo"===s.sku}));return s&&s.isActive&&!s.requiresUpgrade},showLocalBusinessReset:function(){var s=this.addons.find((function(s){return"aioseo-local-business"===s.sku}));return s&&s.isActive&&!s.requiresUpgrade},showRedirectsReset:function(){var s=this.addons.find((function(s){return"aioseo-redirects"===s.sku}));return s&&s.isActive&&!s.requiresUpgrade},canReset:function(){var s=this,t=[];return Object.keys(this.options).forEach((function(e){t.push(s.options[e])})),!t.some((function(s){return s}))},showLogs:function(){return this.showBadBotBlockerLogs||this.$aioseo.data.logSizes.redirectLogs||this.$aioseo.data.logSizes.logs404},showBadBotBlockerLogs:function(){return window.aioseo.internalOptions.internal.deprecatedOptions.includes("badBotBlocker")}}),methods:Object(a["a"])(Object(a["a"])({},Object(n["b"])(["resetSettings","clearLog"])),{},{processResetSettings:function(){var s=this,t=[];this.options.all?this.settings.filter((function(s){return"all"!==s.value})).forEach((function(s){t.push(s.value)})):Object.keys(this.options).forEach((function(e){s.options[e]&&t.push(e)})),this.loading=!0,this.resetSettings(t).then((function(){s.showModal=!1,s.loading=!1,s.showSuccess=!0,s.options={},setTimeout((function(){s.showSuccess=!1}),5e3)}))},getSizeClass:function(s){var t="green";return 262144e3<s?t="orange":1073741274<s&&(t="red"),t},processClearLog:function(s){var t=this;this.loadingLog=s,this.clearLog(s).then((function(){t.loadingLog=null,t.clearedLogs[s]=!0}))},disabledLog:function(s){return!this.$aioseo.data.logSizes[s].original||this.clearedLogs[s]}})},r=l,c=(e("2853"),e("2877")),d=Object(c["a"])(r,o,i,!1,null,null,null);t["default"]=d.exports}}]);