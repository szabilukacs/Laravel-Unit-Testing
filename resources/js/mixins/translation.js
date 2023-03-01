import { forEach } from 'lodash-es'

const translations = {}

function importTranslations (r) {
    r.keys().forEach(key => {
        const normalizedKey = key.replace('./', '')
            .replace('.json', '')

        return translations[normalizedKey] = r(key)
    })
}

importTranslations(require.context('../../lang', false, /\.json$/))


function getLocale() {
    return window.currentLocale
        ? window.currentLocale
        : 'hu'
}

function getTranslation(key) {
    const locale = getLocale()

    if (! translations[locale]) {
        return key
    }

    return translations[locale][key] ? translations[locale][key] : key
}

export default {
    computed: {
        appLocale: getLocale
    },

    methods: {
        /**
         * Translate the given key.
         */
        __(key, replace) {
            let translation = getTranslation(key)

            forEach(replace, (value, key) => {
                translation = translation.replace(':' + key, value)
            })

            return translation
        }
    }
}
