module.exports = {
    "extends": [
        "stylelint-config-recommended-scss",
        "stylelint-config-recommended-vue/scss"
    ],
    rules: {
        'indentation': 4,
        'at-rule-no-unknown': null,
        'scss/at-rule-no-unknown': true,
        'no-empty-source': null,
        'selector-pseudo-element-no-unknown': [
            true,
            {
                ignorePseudoElements: ['v-deep']
            }
        ]
    },
    'ignoreFiles': ['**/*.js'],
    'overrides': [
        {
            'files': ['**/*.scss'],
            'customSyntax': 'postcss-scss'
        },
        {
            'files': ['**/*.vue'],
            'customSyntax': 'postcss-html'
        }
    ]
}