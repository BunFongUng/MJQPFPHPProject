$(document).ready(function() {
   $("#layerslider").layerSlider({
        responsive: false,
        responsiveUnder: 1280,
        layersContainer: 1280,
        skin: 'noskin',
        hoverPrevNext: false,
        skinsPath: '../layerslider/skins/'
    });

    $.get("https://www.googleapis.com/youtube/v3/channels", {
        part: "contentDetails",
        id: "UCJua6wx6Knrj60g4r6q2rXw",
        key: "AIzaSyCxiz84IDpuShsfwzF97O2v2r-uZfXGU-8"
    }, function(data) {
        $.each(data.items, function(i, item) {
            pid = item.contentDetails.relatedPlaylists.uploads;
            getVids(pid);
        })
    });

    function getVids(pid) {
        $.get("https://www.googleapis.com/youtube/v3/playlistItems", {
            part: "snippet",
            maxResults: 1,
            playlistId: pid,
            key: "AIzaSyCxiz84IDpuShsfwzF97O2v2r-uZfXGU-8"
        }, function(data) {
            var output;
            $.each(data.items, function(i, item) {
                videoTitle = item.snippet.title;
                videoId = item.snippet.resourceId.videoId;
                output = "<iframe width='100%' height='310' src='//www.youtube.com/embed/"+ videoId +"' frameborder='0' allowfullscreen></iframe>";
                $("#api").html(output);
            })
        });
    }
});