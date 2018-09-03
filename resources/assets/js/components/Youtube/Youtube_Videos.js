let axios = require('axios');
let items_URL = 'https://www.googleapis.com/youtube/v3/playlistItems';


module.exports = function(playListID, callback) {
    
    let params = {
        part: 'snippet',
        key: 'AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0',
        playlistId: playListID,
        maxResults: 50
    };

    axios.get(items_URL, { params })
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
