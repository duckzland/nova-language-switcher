export const global = {
    methods: {
        getFlag(locale) {
            switch (locale) {
                case 'en_US':
                    return 'us';
                case 'zu':
                    return 'za';
                case 'af':
                    return 'za';
                case 'da':
                    return 'dk';
                case 'ms':
                    return 'my';
                case 'en':
                    return 'gb';
                case 'en_AU':
                    return 'au';
                case 'en_CA':
                    return 'ca';
                case 'fil':
                    return 'ph';
                case 'sq':
                    return 'al';
                case 'sl':
                    return 'si';
                case 'sv':
                    return 'se';
                case 'vi':
                    return 'vn';
                case 'cs':
                    return 'cz';
                case 'el':
                    return 'gr';
                case 'uk':
                    return 'ua';
                case 'he':
                    return 'il';
                case 'ar':
                    return 'ae';
                case 'hi':
                    return 'in';
                case 'lo':
                    return 'la';
                case 'my':
                    return 'mm';
                case 'mn_Mong':
                    return 'mn';
                case 'ja':
                    return 'jp';
                case 'zh':
                    return 'cn';
                case 'zh_Hant':
                    return 'hk';
                case 'ko':
                    return 'kr';
                case 'nb':
                    return 'no';
                case 'ka':
                    return 'ge';
                case 'de_CH':
                    return 'ch';
                case 'sh':
                    return 'rs';
                case 'tk':
                    return 'tm';

            }

            return locale;
        },
        replaceUrlParam(url, paramName, paramValue) {
            if (paramValue == null) {
                paramValue = '';
            }
            let pattern = new RegExp('\\b(' + paramName + '=).*?(&|#|$)');
            if (url.search(pattern) >= 0) {
                return url.replace(pattern, '$1' + paramValue + '$2');
            }
            url = url.replace(/[?#]$/, '');
            return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue;
        },

        changeLocale(value) {
            if (value.locale) {
                window.location = this.replaceUrlParam(window.location.href, window.config.ls_params, value.locale);
            }
        }
    }
}
