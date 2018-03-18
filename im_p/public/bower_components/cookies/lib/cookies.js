'use strict';

var _slicedToArray = (function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; })();

function _typeof(obj) { return obj && typeof Symbol !== "undefined" && obj.constructor === Symbol ? "symbol" : typeof obj; }

/*
* Parse Windows
*/
Object.defineProperties(window.document, {
	"cookies": {

		get: function get() {
			var cookieSpit = document.cookie.split(';');
			var cookies = {};
			var _iteratorNormalCompletion = true;
			var _didIteratorError = false;
			var _iteratorError = undefined;

			try {
				for (var _iterator = cookieSpit[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
					var cookie = _step.value;

					// Delete Space Initial
					while (cookie.charAt(0) == ' ') {
						cookie = cookie.substring(1);
					}
					var _cookie$split = cookie.split("=");

					var _cookie$split2 = _slicedToArray(_cookie$split, 2);

					var _name = _cookie$split2[0];
					var _cookie$split2$ = _cookie$split2[1];

					var _value = _cookie$split2$ === undefined ? "" : _cookie$split2$;

					cookies[_name] = _value;
				}
			} catch (err) {
				_didIteratorError = true;
				_iteratorError = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion && _iterator.return) {
						_iterator.return();
					}
				} finally {
					if (_didIteratorError) {
						throw _iteratorError;
					}
				}
			}

			return cookies;
		},

		set: function set(xCookies) {
			if (Array.isArray(xCookies)) {
				for (var cookie in xCookies) {
					document.cookies = cookie;
				}
			} else if ((typeof xCookies === 'undefined' ? 'undefined' : _typeof(xCookies)) == "object") {
				if (xCookies.hasOwnProperty("name") && xCookies.hasOwnProperty("value")) {
					// "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
					var name = xCookies.name;
					var value = xCookies.value;
					var expires = xCookies.expires;
					var path = xCookies.path;

					var cookie = [name + '=' + value];

					if (xCookies.hasOwnProperty("expires")) {
						if (expires instanceof Date) {
							cookie.push('expires=' + expires.toUTCString());
						} else if (dateParsing = Date.parse(expires)) {
							cookie.push('expires=' + new Date(dateParsing).toUTCString());
						}
					}

					if (xCookies.hasOwnProperty("path")) {
						cookie.push('path=' + path);
					}

					document.cookies = cookie.join(";");
				} else {
					for (var cookieIndex in xCookies) {
						var cookie = xCookies[cookieIndex];
						document.cookies = cookieIndex + '=' + cookie;
					}
				}
			} else if (typeof xCookies == "string") {
				document.cookie = xCookies;
			}
		}
	}
});