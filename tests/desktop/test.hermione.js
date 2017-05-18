var assert = require('chai').assert;

describe('login screen', function() {
    it('should find itself', function() {
        return this.browser
            .url('http://geekbrains.local/index.html')
            .waitForVisible()
            .getText('.container h1')
            .then(function(text) {
                assert.equal(text, 'Library')
            });
    });
});