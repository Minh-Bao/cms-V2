/**
 * Instafeed script to call instagramm account 12 last images.
 */
var feed = new Instafeed({
    accessToken: process.env.MIX_INSTA_TOKEN,
    limit: 12,
    after: function() {
        var container = document.getElementById('instafeed');
        for (var i = 0; i < container.children.length; i++) {
            var parent = container.children;
            for (var j = 0; j < parent.length; j++) {
                var child_img = parent[j].children;
                child_img[0].setAttribute("class", "shadow  bg-white rounded-lg ");
                parent[j].setAttribute('target', '_blank');
            }
        }
    },
    error: function() {
        document.getElementById('insta_error_msg').style.display = "block";
    }
});

//run the feed
feed.run();
