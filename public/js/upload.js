var feedback = function(res) {
    if (res.success === true) {
        console.log(res);
        var get_link = res.data.link;
        document.querySelector('.status').classList.add('bg-success');
        document.getElementById('img').value=get_link;
        document.querySelector('.status').innerHTML =
            'Image : <br><img class="img" alt="Imgur-Upload" src="'+ get_link +'"/>';
    }
};

new Imgur({
    clientid: 'd355aaa293b44c1', //You can change this ClientID
    callback: feedback
});