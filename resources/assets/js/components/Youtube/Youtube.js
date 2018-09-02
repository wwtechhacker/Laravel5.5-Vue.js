let axios = require('axios');
let BASE_URL = 'https://www.googleapis.com/youtube/v3/search';


module.exports = function(options, callback) {

    if (!options.apiKey) {

        throw new Error('Youtube search requires a valid API key');
    }

    let params = {
        part: 'snippet',
        key: options.apiKey,
        q: options.term,
        maxResults: (options.items) ? options.items : 25,
        type: 'video'
    };

    axios.get(BASE_URL, { params })
    .then((response) => {
        console.log(response);
        if (callback) {
            callback(response.data.items)
        }
    })
    .catch((response) => {
        if (response.status == undefined) {
            console.log(response);
        }
    })
}
