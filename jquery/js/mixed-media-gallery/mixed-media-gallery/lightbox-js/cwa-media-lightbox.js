function mediaLightbox(arrMedia){
    let arrayLength = arrMedia.length;
    let currentIndex = 0;
    const body = $('body');

    /* HTML LIGHTBOX COMPONENTS */
    body.append('<div class="lightbox-overlay"><figure class="lightbox-content"></figure></div>');
    const lightboxOverlay = $('.lightbox-overlay');
    let lightboxContent = $('.lightbox-content');

    //navigation buttons
    if(arrayLength > 1){
        lightboxOverlay.append('<button class="prev" title="Previous">&#10094;</button>');
        lightboxOverlay.append('<button class="next" title="Next">&#10095;</button>');
    }

    //close button
    lightboxOverlay.append('<button class="close">&times;</button>');

    //index counter
    lightboxContent.append(`
    <div class="index-counter">
        <span class="pgNum"></span> | <span class="totalPg"></span>
    </div>`);
    
    $(".totalPg").text(arrayLength);

    lightboxContent.append('<div class="media-container"></div>');
    lightboxContent.append('<div class="lightbox-loader"></div>');

    //content/image description
    lightboxContent.append('<figcaption class="desc"></figcaption>');

    showLightbox(currentIndex);

    // disables scrolling in window
    body.addClass('lightbox-scroll'); 

    function showLightbox(index){
        let currentPage = $('.pgNum');
        let loader = $(".lightbox-content .lightbox-loader");
        let mediaContainer = $(".media-container");
        let desc = $('.desc');

        currentIndex = (index + arrayLength) % arrayLength;

        //shows loader
        lightboxContent.css('justify-content', 'center');
        loader.show();
        $('.index-counter').css("position", "absolute"); 
        //hides media container
        mediaContainer.hide();
        desc.hide();

        let mediaType = arrMedia[currentIndex].type;
        let descText = arrMedia[currentIndex].desc;

        // Find occurrences of http/https links in the text and replace them with <a> tags
        descText = descText.replace(/(https?:\/\/[^\s]+)/g, function(displayedLink) {
            return `<a href="${displayedLink}" target="_blank" rel="noopener noreferrer">${displayedLink}</a>`;
        });

        switch(mediaType){
            case "video":
                let videoContainer = $(`
                <video controls disablepictureinpicture autoplay>
                    <source type="video/mp4">
                    <source type="video/webm">
                    <source type="video/ogg">
                    Your browser does not support the video tag.
                </video>`);
                videoContainer.prop("volume", 0.35);

                let newVideo = document.createElement('video');
                newVideo.src = arrMedia[currentIndex].src;

                newVideo.onloadedmetadata = function(){
                    lightboxContent.css('justify-content', 'space-between');
                    mediaContainer.hide().fadeIn();
                    desc.hide().fadeIn();
                    videoContainer.find('source').attr("src", newVideo.src);
                    
                    mediaContainer.empty().append(videoContainer);

                    loader.hide(); 
                    $('.index-counter').css("position", "relative"); 
                    
                    desc.empty().append(descText);
                    currentPage.text(currentIndex + 1);
                }
                break;
            
            case "image":
                let imageContainer = $('<img loading="lazy">');
                let newImg = new Image();
                newImg.src = arrMedia[currentIndex].src;

                newImg.onload = function() {
                    lightboxContent.css('justify-content', 'space-between');
                    mediaContainer.hide().fadeIn();
                    desc.hide().fadeIn();
                    imageContainer.attr("src", newImg.src);

                    mediaContainer.empty().append(imageContainer);

                    loader.hide();  
                    $('.index-counter').css("position", "relative"); 
                    
                    desc.empty().append(descText);
                    currentPage.text(currentIndex + 1);
                };
                break;

            case "iframe":
                let iframeContainer = $(`<iframe title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`)
                let iframeSrc = arrMedia[currentIndex].src;

                lightboxContent.css('justify-content', 'space-between');
                mediaContainer.hide().fadeIn();
                desc.hide().fadeIn();
                iframeContainer.attr("src", iframeSrc);

                mediaContainer.empty().append(iframeContainer);
                
                loader.hide();  
                $('.index-counter').css("position", "relative"); 
                
                desc.empty().append(descText);
                currentPage.text(currentIndex + 1);
                break;
        }
    }

    //CLICK EVENTS
    // Function to close the lightbox
    function closeLightbox() {
        $(".lightbox-overlay").remove();
        // enables scrolling in window
        body.removeClass('lightbox-scroll'); 
    }

    // Listen for the "popstate" event (back button)
    window.history.pushState({id:1}, null, null);
    window.addEventListener('popstate', function(){
        closeLightbox();
    });

    $(".close").on('click', function(){
        closeLightbox();
    });

    $(".prev").on('click', function(){
        showLightbox(currentIndex -= 1);
    });

    $(".next").on('click', function(){
        showLightbox(currentIndex += 1);
    });

    $(document).on( "keydown", function(e) {
        if (e.key === "ArrowLeft") { // Left arrow key
            showLightbox(currentIndex -= 1);
        }
        else if (e.key === "ArrowRight") { // Right arrow key
            showLightbox(currentIndex += 1);
        }
    });
}