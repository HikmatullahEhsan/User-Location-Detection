/*
* Parse Windows
*/
Object.defineProperties(window.document, {
	"cookies": {

		get: function () {
			let cookieSpit = document.cookie.split(';');
			let cookies = {};
			for (let cookie of cookieSpit) {
				// Delete Space Initial
				while (cookie.charAt(0)==' ') cookie = cookie.substring(1);
				let [_name, _value = ""] = cookie.split("=");
				cookies[_name] = _value;
			}
			return cookies;
		},

		set: function (xCookies) {
			if (Array.isArray(xCookies)) {
				for (let cookie in xCookies) {
					document.cookies = cookie;
				}
			} else
			if (typeof(xCookies) == "object") {
				if (
					xCookies.hasOwnProperty("name") &&
					xCookies.hasOwnProperty("value")
					) {
					// "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
					let {name, value, expires, path} = xCookies;
					let cookie = [`${name}=${value}`];

					if (xCookies.hasOwnProperty("expires")) {
						if (expires instanceof Date) {
							cookie.push(`expires=${expires.toUTCString()}`);
						} else
						if (dateParsing = Date.parse(expires)) {
							cookie.push(`expires=${(new Date(dateParsing)).toUTCString()}`);
						}
					}

					if (xCookies.hasOwnProperty("path")) {
						cookie.push(`path=${path}`);
					}

					document.cookies = cookie.join(";");
				} else {
					for (let cookieIndex in xCookies) {
						let cookie = xCookies[cookieIndex];
						document.cookies = `${cookieIndex}=${cookie}`;
					}
				}
			} else
			if (typeof(xCookies) == "string") {
				document.cookie = xCookies;
			}
		}
	}
});

