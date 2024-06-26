# jQuery Lightbox Gallery [Version 2]

Link to version 1: <https://github.com/HashBrownTTM/jQuery-Lightbox-Gallery/>

Table of Contents:
- [`1. Demo`](#1-demo)
  
- [`2. Usage`](#2-usage)
  - [`i. for images`](#i-for-images)
  - [`ii. for videos`](#ii-for-videos)
  - [`iii. for multimedia (images, videos, iframes)`](#iii-for-multimedia-images-videos-iframes)

## 1. Demo

URL: <https://cwa-jquery-lightbox-v2.netlify.app/>

A look at the layout of the lightbox:

![image](https://github.com/HashBrownTTM/jQuery-Lightbox-Gallery-V2/assets/93540733/bb520f8f-4ae1-4c86-a37f-9933d02e8c86)


## 2. Usage

To use this jQuery script, add the following or similar jQuery plugin to your HTML

~~~
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
~~~

the following css file also needs to be added:
> *[cwa-lightbox.css](https://github.com/HashBrownTTM/jQuery-Lightbox-Gallery-V2/blob/main/lightbox-css/cwa-lightbox.css)*

### i. for images

For the images only lightbox, add the following .js file:
> *[cwa-image-lightbox.js](https://github.com/HashBrownTTM/jQuery-Lightbox-Gallery-V2/blob/main/lightbox-js/cwa-image-lightbox.js)*
>
> The code appends the imageContainer into the lightbox's mediaContainer

~~~
let imageContainer = $('<img loading="lazy">');
let newImg = new Image();
newImg.src = arrImages[currentIndex].src;

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
~~~

### ii. for videos

> *[cwa-video-lightbox.js](https://github.com/HashBrownTTM/jQuery-Lightbox-Gallery-V2/blob/main/lightbox-js/cwa-video-lightbox.js)*
>
> The code appends the videoContainer
>> Note: the HTML video tag supports MP4, WebM, and Ogg video formats: <https://www.w3schools.com/html/html5_video.asp>

~~~
let videoContainer = $(`
    <video controls disablepictureinpicture autoplay>
        <source type="video/mp4">
        <source type="video/webm">
        <source type="video/ogg">
        Your browser does not support the video tag.
    </video>`);
videoContainer.prop("volume", 0.35);

let newVideo = document.createElement('video');
newVideo.src = arrVideos[currentIndex].src;

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
~~~

### iii. for multimedia (images, videos, iframes)

> *[cwa-media-lightbox.js](https://github.com/HashBrownTTM/jQuery-Lightbox-Gallery-V2/blob/main/lightbox-js/cwa-media-lightbox.js)*
> 
> In this instance, specifying what the media types are is needed, as seen in this JSON data (of course there are other ways of doing this):
>
>> Note for the iframe: the url/link is the link that will be in the src of the HTML iframe tag

~~~
[
  {
      "src" : "media/images/will-4lbniAdMzcc-unsplash.webp",
      "type": "image",
      "desc" : "Photo by Will on Unsplash https://unsplash.com/photos/4lbniAdMzcc"
  },
  {
      "src" : "media/videos/video (720p).mp4",
      "type": "video",
      "desc" : "Video by Pressmaster: https://www.pexels.com/video/digital-formation-of-a-dna-in-an-animated-presentation-3191572/"
  },
  {
      "src" : "https://www.youtube.com/embed/dQw4w9WgXcQ?si=FmFdlBKYvNF_Evze",
      "type": "iframe",
      "desc" : "Rick Astley - Never Gonna Give You Up (Official Music Video)"
  }
]
~~~

> The code then checks for the media type via a switch statement, and appends the corresponding media container:

~~~
switch(mediaType){
    case "video":
        //Code for appending the videoContainer
        break;
    
    case "image":
        //Code for appending the imageContainer
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
~~~
