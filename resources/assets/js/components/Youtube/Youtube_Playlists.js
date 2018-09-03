let axios = require('axios');
let list_URL = 'https://www.googleapis.com/youtube/v3/playlists';


module.exports = function(options, callback) {

    if (!options.channelID) {

        throw new Error('Youtube search requires a valid channel ID');
    }
    
    let params = {
        part: 'snippet, id',
        key: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
        channelId: options.channelID,
        maxResults: 50
    };

    axios.get(list_URL, { params })
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
