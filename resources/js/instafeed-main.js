var feed = new Instafeed({
    accessToken: 'IGQVJXNkVIMkdDcHNLaE5wSk92WUFtTTlXaEFvd0lrUFROVWRuXy10MGJsRktzelRJSVBHRVdpQ1dxcDd0czFqMnZA1dTE5MmxMcVFYeWVYRHc4X0lSQTI0YnJzc1VEUm5sVGcwSnJNMzBIVE1zYmQzOAZDZD',
    limit: 12,
    template:'<a class="col-md-3" target="_blank href="{{link}}"><img class="img-thumbnail shadow  bg-white rounded img_insta" title="{{caption}}" src="{{image}}" /></a>',
    error: function(){
        document.getElementById('insta_error_msg').style.display = "block";
    }
});
feed.run();