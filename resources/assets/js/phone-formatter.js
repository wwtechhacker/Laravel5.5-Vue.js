var api,
    formatRegex         = /(\d{3})-?(\d{3})?-?(\d{4})?/,
    compose             = function () {
        var funcs = [].slice.call(arguments);

        return funcs.reduce(function (f, g) {
            return function () {
                return f(g.apply(this, arguments));
            };
        });
    },
    formatNumber = compose(limitAt12, joinWords, formatCharsWithDash, splitChars, removeNonDigits);

function formatCharsWithDash(value) {
    return value.reduce(function (a, b) {
        if ([3, 7].indexOf(a.length) !== -1) {
            a.push('-');
        }
        a.push(b);
        return a;
    }, []);
}

function removeNonDigits(inValue) {
    return String(inValue).replace(/[^\d]/g, '');
}

function splitChars(word) {
    return word.split('');
}

function joinWords(words) {
    return words.join('');
}

function limitAt12(word) {
    return word.slice(0, 12);
}

function bind(elem) {
    var $elem = $(elem);

    if (!!$elem.length) {
        $(elem).off('keyup.phone blur.phone').on('keyup.phone keyup.phone blur.phone', function () {
            $(this).val(formatNumber(this.value));
        });
    }
}

module.exports = bind;








