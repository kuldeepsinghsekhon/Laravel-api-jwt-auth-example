(window.webpackJsonp=window.webpackJsonp||[]).push([[19],{"/0xM":function(e,t,r){e.exports={wrapper:"Search__wrapper--1naw5",inputWrapper:"Search__inputWrapper--2l044",input:"Search__input--2-TPT",isDisabled:"Search__isDisabled--1VYwx",icon:"Search__icon--2JVT8",close:"Search__close--87cjj"}},"0Z2G":function(e,t,r){e.exports={category:"Categories__category--3MlUK",label:"Categories__label--2B4Vv",icon:"Categories__icon--37jVM",isHidden:"Categories__isHidden--2LDPE"}},AEEq:function(e,t,r){e.exports={wrapper:"Lesson__wrapper--1G7Bv",number:"Lesson__number--1fYjG",title:"Lesson__title--15xqV",anchor:"Lesson__anchor--2cwHz"}},F8mV:function(e,t,r){"use strict";var n=r("q1tI"),a=r.n(n),o=r("17x9"),i=function(e){var t=e.className;return a.a.createElement("svg",{className:t,width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},a.a.createElement("path",{fillRule:"evenodd",clipRule:"evenodd",d:"M6.3999 1.60156C9.05078 1.60156 11.2002 3.75 11.2002 6.39844C11.2002 9.05078 9.05078 11.1992 6.3999 11.1992C3.74902 11.1992 1.6001 9.05078 1.6001 6.39844C1.6001 3.75 3.74902 1.60156 6.3999 1.60156ZM11.4248 10.3633C12.2856 9.27344 12.7998 7.89453 12.7998 6.39844C12.7998 2.86719 9.93457 0 6.3999 0C2.86523 0 0 2.86719 0 6.39844C0 9.93359 2.86523 12.8008 6.3999 12.8008C7.86133 12.8008 9.2085 12.3086 10.2861 11.4844L13.4346 14.6367C13.7471 14.9492 14.2534 14.9492 14.5659 14.6367C14.8784 14.3242 14.8784 13.8164 14.5659 13.5039L11.4248 10.3633Z",transform:"translate(4.3999 4.80078)",fill:"white"}))};i.propTypes={className:r.n(o).a.string},t.a=i},HMyJ:function(e,t,r){e.exports={wrapper:"Article__wrapper--1CpBB",title:"Article__title--SFjuF"}},"N+eV":function(e,t,r){e.exports={wrapper:"Results__wrapper--H6KeY",fade:"Results__fade--36lzH",result:"Results__result--3HQKv",lessonResults:"Results__lessonResults--3YrB-"}},WfVm:function(e,t,r){"use strict";r("XfO3"),r("HEwt"),r("a1Th"),r("Btvt"),r("rE2o"),r("ioFf"),r("rGqo"),r("/SS/"),r("Vd3H"),r("f3/d"),r("Z2Ku"),r("L9s1");var n=r("q1tI"),a=r.n(n),o=r("17x9"),i=r.n(o),c=r("zAUr"),s=r("bt/X"),l=r.n(s),u=r("7tbW"),f=r.n(u),p=r("J2m7"),h=r.n(p),m=r("cagY"),d=r("cTKr"),y=r("B07Q"),g=r("ZhII");function b(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||_(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function v(e){return function(e){if(Array.isArray(e))return e}(e)||_(e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}function _(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}var w=Object(g.a)(function(e){var t=(0,e.highlight)({highlightProperty:"_highlightResult",attribute:e.attribute,hit:e.hit});return t.reduce(function(e,r,n){var a=t[n-1],o=t[n+1],i=" "===r.value&&0!==n&&n<t.length&&a.isHighlighted&&o&&o.isHighlighted,c=0!==n&&r.isHighlighted&&e[e.length-1].isHighlighted;if(i||c){var s=v(e).slice(0),l=s.splice(s.length-1,1)[0];return l.value+=r.value,[].concat(b(s),[l])}return[].concat(b(e),[r])},[]).map(function(e,t){var r=t+e.value;return e.isHighlighted?a.a.createElement("em",{key:r},e.value):a.a.createElement("span",{key:r},e.value)})}),O=r("HMyJ"),S=r.n(O),E=function(e){var t=e.hit;return a.a.createElement("a",{href:"/articles/".concat(t.slug),className:S.a.wrapper,onClick:function(){return e=t.slug,void Object(y.e)("Search Result Viewed",{type:"article",slug:e});var e}},a.a.createElement("span",{className:S.a.title},a.a.createElement(w,{attribute:"title",hit:t})))};E.propTypes={hit:i.a.object};var C=E,j=r("jcqM"),k=r.n(j),R=function(e){var t=e.articles;if(t.length>0){var r=t.slice(0,5).map(function(e){return a.a.createElement(C,{key:e.slug,hit:e})});return a.a.createElement("div",null,a.a.createElement("div",{className:k.a.header},"Articles"),r)}return null};R.propTypes={articles:i.a.array};var T=R,x=r("LH13"),N=r("mbeB"),L=r.n(N),H=function(e){var t=e.url,r=e.headshot,n=e.slug,o=e.hit,i=e.name,c=e.headline;return a.a.createElement("a",{href:t,className:L.a.wrapper,onClick:function(){return e=n,void Object(y.e)("Search Result Viewed",{type:"course",slug:e});var e}},a.a.createElement("div",{style:{backgroundImage:"url(".concat(r,")")},className:L.a.instructorImage}),a.a.createElement("div",{className:L.a.textWrapper},a.a.createElement("span",{className:L.a.name},o?a.a.createElement(x.a,{attribute:"instructor",hit:o}):i),a.a.createElement("span",{className:L.a.headline},o?a.a.createElement(x.a,{attribute:"headline",hit:o}):c)))};H.propTypes={name:i.a.string,headline:i.a.string,url:i.a.string,slug:i.a.string,headshot:i.a.string,hit:i.a.object};var P=H,A=(r("hEkN"),r("r2Ta")),V=r("AEEq"),I=r.n(V);function B(e){return(B="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function W(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function q(e){return(q=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function F(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function M(e,t){return(M=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function K(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var U=function(e){function t(){var e,r,n,a;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);for(var o=arguments.length,i=new Array(o),c=0;c<o;c++)i[c]=arguments[c];return n=this,K(F(r=!(a=(e=q(t)).call.apply(e,[this].concat(i)))||"object"!==B(a)&&"function"!==typeof a?F(n):a),"generateUrl",function(e,t){return A.a.user.id?"/classes/".concat(e).concat(t.chapter_url):"/classes/".concat(e)}),r}var r,o,i;return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&M(e,t)}(t,n["Component"]),r=t,(o=[{key:"render",value:function(){var e=this.props,t=e.lesson,r=e.courseSlug,n=t.number;return a.a.createElement("div",{className:I.a.wrapper},a.a.createElement("a",{href:this.generateUrl(r,t),className:I.a.anchor,onClick:function(){return function(e){Object(y.e)("Search Result Viewed",{type:"lesson",slug:e})}(r)}},a.a.createElement("span",{className:I.a.number},n<10?"0".concat(n):n),a.a.createElement("span",{className:I.a.title},a.a.createElement(x.a,{attribute:"lesson_title",hit:t}))))}}])&&W(r.prototype,o),i&&W(r,i),t}();K(U,"propTypes",{lesson:i.a.object,courseSlug:i.a.string});var D=r("j3RV"),z=r("N+eV"),G=r.n(z);function J(e){return(J="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function Y(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function X(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var r=[],n=!0,a=!1,o=void 0;try{for(var i,c=e[Symbol.iterator]();!(n=(i=c.next()).done)&&(r.push(i.value),!t||r.length!==t);n=!0);}catch(e){a=!0,o=e}finally{try{n||null==c.return||c.return()}finally{if(a)throw o}}return r}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}function Q(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function Z(e){return(Z=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function $(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function ee(e,t){return(ee=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function te(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var re=function(e){return"none"!==e._highlightResult.headline.matchLevel||"none"!==e._highlightResult.instructor.matchLevel||"none"!==e._highlightResult.category.matchLevel},ne=function(e,t){return l()(t.hits,"class_id")[e]},ae=function(e){return"undefined"!==typeof h()(e,function(e){return"none"!==e._highlightResult.lesson_title.matchLevel})},oe=function(e){function t(){var e,r,n,o;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);for(var i=arguments.length,c=new Array(i),s=0;s<i;s++)c[s]=arguments[s];return n=this,o=(e=Z(t)).call.apply(e,[this].concat(c)),te($(r=!o||"object"!==J(o)&&"function"!==typeof o?$(n):o),"state",{hits:[]}),te($(r),"renderAlgoliaCourses",function(){var e=X(r.state.hits,2),t=e[0],n=e[1];return n&&n.hits.length>0?n.hits.map(function(e){var n=ne(e.id,t),o=ae(n);return{rank:re(e)?0:o?1:2,components:a.a.createElement("div",{className:G.a.result,key:e.id},a.a.createElement(P,{hit:e,headshot:e.headshot,slug:e["class slug"],url:e.url}),!r.props.hasCategory&&r.renderLessons(n,e["class slug"]))}}):[]}),te($(r),"renderLocalCourses",function(){var e=r.props,t=e.hasCategory,n=e.courses,o=X(r.state.hits,2),i=o[0],c=o[1],s=i&&i.hits;if(!t&&s&&n){var l=c&&c.hits.map(function(e){return e.id}),u=f()(i.hits.map(function(e){return e.class_id}));return n.filter(function(e){return!l.includes(e.id)&&u.includes(e.id)}).map(function(e){var t=e.id,n=e.headshot,o=e.class_name,c=e["class slug"],s=ne(t,i);return{rank:ae(s)?1:2,components:a.a.createElement("div",{className:G.a.result,key:t},a.a.createElement(P,{headshot:n,slug:c,name:e.instructor.name,headline:Object(d.j)(o,e.instructor.name),url:"/classes/".concat(c)}),r.renderLessons(s,c))}})}return[]}),te($(r),"renderArticles",function(){var e=r.state.hits[2];return e&&e.hits&&e.hits.length>0?a.a.createElement("div",{className:G.a.result,key:"articles"},a.a.createElement(T,{articles:e.hits})):[]}),te($(r),"renderResults",function(){var e=[].concat(Y(r.renderAlgoliaCourses()),Y(r.renderLocalCourses())),t=r.renderArticles();return e.sort(function(e,t){return e.rank-t.rank}).map(function(e){return e.components}).concat([t])}),te($(r),"renderLessons",function(e,t){return e?a.a.createElement("div",{className:G.a.lessonResults},e.map(function(e){return a.a.createElement(U,{key:e.objectID,courseSlug:t,lesson:e})})):null}),r}var r,n,o;return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&ee(e,t)}(t,a.a.Component),r=t,(n=[{key:"componentWillReceiveProps",value:function(e){e.hasCategory?20!==e.hits[1].hits.length?this.setState({hits:e.hits}):this.setState({hits:[]}):e.hasCategory||this.setState({hits:e.hits})}},{key:"render",value:function(){return a.a.createElement("div",{className:Object(c.a)([G.a.wrapper])},a.a.createElement(D.a,{scrollOverflowHeight:this.props.scrollOverflowHeight,renderContent:this.renderResults}))}}])&&Q(r.prototype,n),o&&Q(r,o),t}();te(oe,"propTypes",{hits:i.a.array,hasCategory:i.a.bool,courses:i.a.array,scrollOverflowHeight:i.a.number});t.a=Object(m.a)(oe)},cTKr:function(e,t,r){"use strict";r.d(t,"a",function(){return s}),r.d(t,"l",function(){return l}),r.d(t,"g",function(){return u}),r.d(t,"n",function(){return f}),r.d(t,"d",function(){return p}),r.d(t,"b",function(){return h}),r.d(t,"c",function(){return m}),r.d(t,"e",function(){return d}),r.d(t,"k",function(){return y}),r.d(t,"j",function(){return g}),r.d(t,"i",function(){return b}),r.d(t,"h",function(){return v}),r.d(t,"m",function(){return _}),r.d(t,"f",function(){return w});r("KKXr"),r("pIFo"),r("f3/d"),r("SRfc"),r("rGqo"),r("yt8O"),r("Btvt"),r("hhXQ"),r("Vd3H"),r("dRSK");var n=r("cr+I"),a=r.n(n),o=r("E+oP"),i=r.n(o),c=r("79+i"),s=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};if(i()(t))return e;var n=a.a.stringify(t,r);return"".concat(e,"?").concat(n)},l=function(){return c.get("last_cm_page")},u=function(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:[]).find(function(e){return e.slug===l()})},f=function(e){if(!e)return"00:00 min";var t=new Date(1e3*e).toUTCString().match(/(\d\d:\d\d:\d\d)/)[0];return"".concat(t.substr(t.length-5)," min")},p=function(e,t){return e&&t?e/t*100:0},h=function(e){return e.progressEntries.filter(function(e){return e.completed}).length},m=function(e){return e.chapters.length},d=function(e){return h(e)/m(e.course)*100},y=function(e){return e.map(function(e){return e.name}).join(" and ")},g=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return-1===e.toLowerCase().indexOf(t.toLowerCase())?e:e.trim().slice(t.length).trim()},b=function(e){var t="0".concat(e.number).slice(-2);return"".concat(t,". ").concat(e.title)},v=function(e){return e<10?"0".concat(e):"".concat(e)},_=function(e){return e>8?":heart:":e>6?":neutral_face:":":x:"},w=function(e){return e.split("").reduce(function(e,t,r){return"".concat(e).concat(r&&/[A-Z]/.test(t)?"_":"").concat(t.toLowerCase())},"").replace(/::_/g,"/")}},iZdN:function(e,t,r){"use strict";r("rE2o"),r("ioFf"),r("/SS/");var n=r("q1tI"),a=r.n(n),o=r("17x9"),i=r.n(o),c=r("B07Q"),s=r("2f3x"),l=r("1Xsj"),u=r.n(l),f=r("F8mV"),p=r("/0xM"),h=r.n(p);function m(e){return(m="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function d(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function y(e){return(y=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function g(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function b(e,t){return(b=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function v(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var _=function(e){function t(e){var r,n,o;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),n=this,o=y(t).call(this,e),v(g(r=!o||"object"!==m(o)&&"function"!==typeof o?g(n):o),"handleChange",function(e){r.props.category&&r.props.resetCategory(),r.props.toggleHasSearchValue(e.target.value),r.props.refine(e.target.value),r.segmentDelayTrigger()}),v(g(r),"segmentDelayTrigger",function(){r.currentTimeout&&clearTimeout(r.currentTimeout),r.currentTimeout=setTimeout(r.segmentEvent,2e3)}),v(g(r),"segmentEvent",function(){r.props.currentRefinement.length>3&&Object(c.e)("Search String Entered",{string:r.props.currentRefinement})}),v(g(r),"handleCloseClick",function(){setTimeout(function(){r.props.refine(null),r.props.resetSearch()},1)}),r.inputRef=a.a.createRef(),r}var r,n,o;return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&b(e,t)}(t,a.a.Component),r=t,(n=[{key:"componentWillReceiveProps",value:function(e){!e.isOpen&&this.props.isOpen&&this.handleCloseClick()}},{key:"componentDidUpdate",value:function(e){!e.isOpen&&this.props.isOpen&&this.inputRef.current.focus()}},{key:"render",value:function(){var e=this,t=this.props.category?this.props.category:this.props.currentRefinement;return a.a.createElement("div",{className:h.a.wrapper,onBlur:function(){return e.segmentEvent()}},a.a.createElement("div",{className:h.a.inputWrapper},a.a.createElement(f.a,{className:h.a.icon}),a.a.createElement("input",{ref:this.inputRef,className:h.a.input,type:"text",spellCheck:"false",autoCorrect:"false",onChange:this.handleChange,onClick:function(){return Object(c.e)("Search Start")},value:t}),t&&t.length>0&&a.a.createElement(u.a,{className:h.a.close,onClick:this.handleCloseClick})))}}])&&d(r.prototype,n),o&&d(r,o),t}();v(_,"propTypes",{isOpen:i.a.bool,category:i.a.string,resetCategory:i.a.func,toggleHasSearchValue:i.a.func,refine:i.a.func,resetSearch:i.a.func,currentRefinement:i.a.string}),t.a=Object(s.a)(_)},j3RV:function(e,t,r){"use strict";r("91GP");var n=r("q1tI"),a=r.n(n),o=r("17x9"),i=r.n(o),c=r("lU33"),s=r("zAUr"),l=r("r2Ta"),u=r("tIDY"),f=r("ovJQ"),p=r.n(f);function h(){return(h=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e}).apply(this,arguments)}var m={renderContent:i.a.func,scrollOverflowHeight:i.a.number},d=function(e){var t=e.renderContent,r=e.scrollOverflowHeight;return a.a.createElement(c.a,{query:"(min-width: 768px)"},function(e){return e?a.a.createElement(u.Scrollbars,{alwaysRenderScrollbar:!0,browserScrollbarWidth:15,hideTracksWhenNotNeeded:!0,autoHeight:!0,autoHeightMin:0,autoHeightMax:r,renderTrackVertical:function(e){return a.a.createElement("div",h({},e,{className:p.a.track}))},renderThumbVertical:function(e){return a.a.createElement("div",h({},e,{className:p.a.scrollbar}))}},t()):a.a.createElement("div",{className:Object(s.a)([p.a.mobileScroll,l.a.browserSafari&&p.a.isSafari])},t())})};d.propTypes=m,t.a=d},jcqM:function(e,t,r){e.exports={header:"Articles__header--2Fbj4"}},mbeB:function(e,t,r){e.exports={wrapper:"Instructor__wrapper--24MTT",textWrapper:"Instructor__textWrapper--2xILj",instructorImage:"Instructor__instructorImage--1uUBQ",name:"Instructor__name--2jKQi",headline:"Instructor__headline--32uYV"}},mylE:function(e,t,r){e.exports={wrapper:"Root__wrapper--HTnJb",isLegacy:"Root__isLegacy---vID9",toggleWrapper:"Root__toggleWrapper--3bAa-",searchLabel:"Root__searchLabel--3rn0Y",searchBox:"Root__searchBox--1SKFc",icon:"Root__icon--2u3rV",isOpen:"Root__isOpen--4ElbP",bodyOpenClass:"Root__bodyOpenClass--3Xx7Y",mobileClose:"Root__mobileClose--wETVN",mobileCloseLabel:"Root__mobileCloseLabel--3sIYE",zindex:"Root__zindex--18a-T",labelForced:"Root__labelForced--9GsJ4"}},ovJQ:function(e,t,r){e.exports={track:"Scrollable__track--2p_Rv",scrollbar:"Scrollable__scrollbar--2KgDl",mobileScroll:"Scrollable__mobileScroll--1F_WF",isSafari:"Scrollable__isSafari--2KLGt"}},vjgX:function(e,t,r){"use strict";r("rE2o"),r("ioFf"),r("/SS/");var n=r("q1tI"),a=r.n(n),o=r("17x9"),i=r.n(o),c=r("zAUr"),s=r("qGD4"),l=r("j3RV"),u=r("0Z2G"),f=r.n(u);function p(e){return(p="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function h(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function m(e){return(m=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function d(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function y(e,t){return(y=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function g(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var b=function(){return a.a.createElement("svg",{className:f.a.icon,width:"6",height:"10",viewBox:"0 0 6 10",fill:"none",xmlns:"http://www.w3.org/2000/svg"},a.a.createElement("path",{d:"M3.96471 0L0 4L3.96471 8",transform:"translate(4.96484 9) rotate(180)",stroke:"white",strokeWidth:"2",strokeLinecap:"round",strokeLinejoin:"round"}))},v=function(e){function t(){var e,r,n,o;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);for(var i=arguments.length,c=new Array(i),s=0;s<i;s++)c[s]=arguments[s];return n=this,o=(e=m(t)).call.apply(e,[this].concat(c)),g(d(r=!o||"object"!==p(o)&&"function"!==typeof o?d(n):o),"refine",function(e){setTimeout(function(){r.props.onRefineClick(e),r.props.refine(e)},1)}),g(d(r),"renderCategories",function(){return r.props.items.map(function(e){return a.a.createElement("div",{key:e.value,onClick:function(){r.refine(e.value)},className:f.a.category},a.a.createElement("p",{className:f.a.label},e.label),a.a.createElement(b,null))})}),r}var r,n,o;return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&y(e,t)}(t,a.a.Component),r=t,(n=[{key:"componentWillReceiveProps",value:function(e){e.category||"string"!==typeof this.props.category||this.props.refine(null)}},{key:"render",value:function(){return a.a.createElement("div",{className:Object(c.a)([this.props.category&&f.a.isHidden])},a.a.createElement(l.a,{scrollOverflowHeight:this.props.scrollOverflowHeight,renderContent:this.renderCategories}))}}])&&h(r.prototype,n),o&&h(r,o),t}();g(v,"propTypes",{category:i.a.string,onRefineClick:i.a.func,refine:i.a.func,items:i.a.array,scrollOverflowHeight:i.a.number}),t.a=Object(s.a)(v)},wUlR:function(e,t,r){"use strict";r.d(t,"a",function(){return L});r("XfO3"),r("HEwt"),r("a1Th"),r("Btvt"),r("rE2o"),r("ioFf"),r("rGqo"),r("/SS/");var n=r("q1tI"),a=r.n(n),o=r("17x9"),i=r.n(o),c=r("i8i4"),s=r.n(c),l=r("B07Q"),u=r("zAUr"),f=r("HUu7"),p=r("ObT+"),h=r("hnrd"),m=r.n(h),d=r("WfVm"),y=r("vjgX"),g=r("F8mV"),b=r("iZdN"),v=r("mylE"),_=r.n(v);function w(e){return(w="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function O(e){return function(e){if(Array.isArray(e)){for(var t=0,r=new Array(e.length);t<e.length;t++)r[t]=e[t];return r}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}function S(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function E(e){return(E=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function C(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function j(e,t){return(j=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function k(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var R=function(){return window.innerHeight-159},T="UJJAK2X1PY",x="200a495f09d8e72d4e93c3d15bd1c8dc",N="test_classes_sh",L=function(e){function t(){var e,r,n,a;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);for(var o=arguments.length,i=new Array(o),c=0;c<o;c++)i[c]=arguments[c];return n=this,a=(e=E(t)).call.apply(e,[this].concat(i)),k(C(r=!a||"object"!==w(a)&&"function"!==typeof a?C(n):a),"state",{category:null,hasSearchValue:!1,isOpen:!1,courses:null,scrollOverflowHeight:R()}),k(C(r),"handleResize",function(){clearTimeout(r.timeout),r.timeout=setTimeout(function(){r.setState({scrollOverflowHeight:R()})},200),r.setRightTitle()}),k(C(r),"handleRefineClick",function(e){Object(l.e)("Search String Entered",{string:e}),r.setState({category:e,searchState:"category"})}),k(C(r),"handleSearchClick",function(){r.closeSearch()}),k(C(r),"handleOutsideClick",function(e){var t=".".concat(_.a.wrapper,", .").concat(_.a.searchBox),n=e.target.closest(t);r.state.isOpen&&!n&&(document.body.classList.remove(_.a.bodyOpenClass),r.setState({isOpen:!1,category:null,hasSearchValue:!1}))}),k(C(r),"closeSearch",function(){r.setState(function(e){return{isOpen:!e.isOpen}},function(){r.state.isOpen?document.body.classList.add(_.a.bodyOpenClass):document.body.classList.remove(_.a.bodyOpenClass)})}),k(C(r),"fetchCourses",function(e){var t=[],n=m()(T,x).initIndex(N).browseAll();n.on("result",function(e){t=t.concat(e.hits)}),n.on("end",function(){r.setState({courses:O(t)})}),n.on("error",function(t){e?r.setState({error:!0,algoliaError:t}):r.fetchCourses(!0)})}),k(C(r),"resetSearch",function(){r.setState({category:null,hasSearchValue:!1})}),k(C(r),"setRightTitle",function(){var e=window.innerWidth>767,t=r.props,n=t.desktopTitle,a=t.mobileTitle;r.setState({title:e?n:a,isMediumOrBigger:e})}),k(C(r),"resetCategory",function(){r.setState({category:null})}),k(C(r),"toggleHasSearchValue",function(e){r.setState({hasSearchValue:e.length>0})}),r}var r,n,o;return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&j(e,t)}(t,a.a.Component),r=t,(n=[{key:"componentDidMount",value:function(){this.fetchCourses(),this.setRightTitle(),window.addEventListener("resize",this.handleResize),document.addEventListener("touchend",this.handleOutsideClick,!0),document.addEventListener("click",this.handleOutsideClick)}},{key:"componentWillUnmount",value:function(){clearTimeout(this.timeout),window.removeEventListener("resize",this.handleResize),document.removeEventListener("touchend",this.handleOutsideClick,!0),document.removeEventListener("click",this.handleOutsideClick)}},{key:"renderSearch",value:function(){var e=this.state,t=e.isOpen,r=e.category,n=e.hasSearchValue,o=e.courses,i=e.scrollOverflowHeight,c=this.props.isLegacy;return a.a.createElement("div",{className:Object(u.a)([t&&_.a.isOpen,c&&_.a.isLegacy,_.a.searchBox])},a.a.createElement("div",{className:_.a.mobileClose},a.a.createElement("span",{onClick:this.handleSearchClick,className:_.a.mobileCloseLabel},"close")),a.a.createElement(f.a,{appId:T,apiKey:x,indexName:"test_lessons_sh"},a.a.createElement(b.a,{isOpen:t,category:r,resetSearch:this.resetSearch,resetCategory:this.resetCategory,toggleHasSearchValue:this.toggleHasSearchValue}),n?a.a.createElement(a.a.Fragment,null,a.a.createElement(d.a,{courses:o,hasCategory:!1,scrollOverflowHeight:i}),a.a.createElement(p.a,{indexName:N}),a.a.createElement(p.a,{indexName:"test_articles"})):a.a.createElement(p.a,{indexName:N},a.a.createElement(y.a,{attribute:"category",category:r,scrollOverflowHeight:i,onRefineClick:this.handleRefineClick}),r&&a.a.createElement(d.a,{hasCategory:!0,scrollOverflowHeight:i}))))}},{key:"render",value:function(){var e=this.state,t=e.title,r=e.isMediumOrBigger,n=e.isOpen,o=this.props.isLegacy;return a.a.createElement("div",{className:Object(u.a)([_.a.wrapper,o&&_.a.isLegacy])},a.a.createElement("div",{className:Object(u.a)([_.a.toggleWrapper,n&&_.a.isOpen]),onClick:this.handleSearchClick},(!t||t&&r)&&a.a.createElement(g.a,{className:_.a.icon}),a.a.createElement("span",{className:Object(u.a)([_.a.searchLabel,t&&_.a.labelForced])},t||"search")),o?s.a.createPortal(this.renderSearch(),document.querySelector(".mc-header__dropdowns .mc-container")):this.renderSearch())}}])&&S(r.prototype,n),o&&S(r,o),t}();k(L,"propTypes",{isLegacy:i.a.bool,desktopTitle:i.a.string,mobileTitle:i.a.string})},wWKD:function(e,t,r){"use strict";r.r(t);r("91GP");var n,a,o,i,c,s,l,u=r("q1tI"),f=r.n(u),p=r("i8i4"),h=r.n(p),m=r("0cfB"),d=r("wUlR");n=d.a,a={isLegacy:!0},o=document.getElementById("algolia-search"),i=o.dataset,c=i.desktopTitle,s=i.mobileTitle,l=Object.assign({},a,{desktopTitle:c,mobileTitle:s}),h.a.render(f.a.createElement(m.AppContainer,null,f.a.createElement(n,l)),o)}}]);