$(function () {
    const arrImages = [
        {
            src: "https://www.jqueryscript.net/dummy/1.jpg",
            desc: "Image Description 1"
        },
        {
            src: "https://www.jqueryscript.net/dummy/2.jpg",
            desc: "Image Description 2"
        },
        {
            src: "https://www.jqueryscript.net/dummy/3.jpg",
            desc: "Image Description 3"
        },
        {
            src: "https://www.jqueryscript.net/dummy/4.jpg",
            desc: "Image Description 4"
        },
        {
            src: "https://www.jqueryscript.net/dummy/5.jpg",
            desc: "Image Description 5"
        }
    ]

    const arrVideos = [
        {
            src: "https://www.jqueryscript.net/dummy/1.mp4",
            desc: "Video Description 1"
        },
        {
            src: "https://www.jqueryscript.net/dummy/example.mp4",
            desc: "Video Description 2"
        },
    ]

    const arrMedia = [
        {
            src: "https://www.jqueryscript.net/dummy/1.jpg",
            type: "image",
            desc: "Image Description"
        },
        {
            src: "https://www.jqueryscript.net/dummy/1.mp4",
            type: "video",
            desc: "Video Description"
        },
        {
            src: "https://www.youtube.com/embed/KQUcvnFaNwM?si=DGjAiLeQc2yZoMgm",
            type: "iframe",
            desc: "40 MIN Intermediate Ashtanga Fire Flow"
        }
    ]

    const imageSectionContainer = $('.image-section');
    const videoSectionContainer = $('.video-section');
    const imageGallery = $(`<div class="image-gallery"></div>`);
    const videoGallery = $(`<div class="video-gallery"></div>`);
    const btnOpenMediaLightbox = $('#btn-open-media-lightbox');

    $.each(arrImages, function (key, image) {
        let imageSrc = image.src;

        let imageLink = $(`
            <a class="thumbnail-box gallery-images" href="${imageSrc}">
                <img src="${imageSrc}" alt="gallery-img_${key}" loading="lazy"/>
            </a>`);

        imageLink.on('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            imageLightbox(arrImages, key);
        });

        imageGallery.append(imageLink);
        imageSectionContainer.append(imageGallery);
    });

    $.each(arrVideos, function (key, video) {
        let videoSrc = video.src;

        let videoLink = $(`
            <a class="thumbnail-box gallery-videos" href="${videoSrc}">
                <video src="${videoSrc}" muted></video>
            </a>`);

        videoLink.on('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            videoLightbox(arrVideos, key);
        });

        videoGallery.append(videoLink);
        videoSectionContainer.append(videoGallery);
    });

    btnOpenMediaLightbox.on('click', function () {
        mediaLightbox(arrMedia);
    });
});
