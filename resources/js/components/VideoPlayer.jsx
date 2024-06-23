import React, { useEffect, useRef, useState } from 'react';
import ReactDOM from 'react-dom/client';

const VideoPlayer = ({ videoSrc, thumbnailSrc, description, scheduledTime, published, viewLink, editLink, deleteLink, isOwner }) => {
    const [isThumbnailVisible, setThumbnailVisible] = useState(!!thumbnailSrc);
    const videoRef = useRef(null);

    const handlePlay = () => {
        setThumbnailVisible(false);
    };

    useEffect(() => {
        const videoElement = videoRef.current;
        if (videoElement) {
            videoElement.addEventListener('play', handlePlay);
            return () => {
                videoElement.removeEventListener('play', handlePlay);
            };
        }
    }, []);

    return (
        <div className="mt-4 overflow-auto">
            <div className="bg-gray-700 p-6 rounded-lg shadow-md mb-4 flex items-center relative text-white">
                <div className="mr-4 relative">
                    {isThumbnailVisible && (
                        <img src={thumbnailSrc} alt="Thumbnail" className="w-64 h-40 object-cover rounded-lg absolute" />
                    )}
                    <video
                        ref={videoRef}
                        src={videoSrc}
                        type="video/mp4"
                        className="w-64 h-40 rounded-lg"
                        controls
                    ></video>
                </div>
                <div className="flex-grow">
                    <p className="mb-2">{description}</p>
                    <p className="text-sm text-gray-400 mb-2">{scheduledTime ? scheduledTime : 'No scheduled time'}</p>
                    <p className="text-sm text-green-400">{published ? 'Published' : 'Unpublished'}</p>
                </div>
                <div className="flex space-x-2 absolute top-4 right-4">
                    <a href={viewLink} className="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">View</a>
                    {isOwner && (
                        <>
                            <a href={editLink} className="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">Edit</a>
                            <form method="POST" action={deleteLink} className="inline">
                                <input type="hidden" name="_method" value="DELETE" />
                                <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]').getAttribute('content')} />
                                <button type="submit" className="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">Delete</button>
                            </form>
                        </>
                    )}
                </div>
            </div>
        </div>
    );
};

// Initialize the VideoPlayer component in the DOM
document.querySelectorAll('.video-player').forEach(element => {
    const videoSrc = element.getAttribute('data-video-src');
    const thumbnailSrc = element.getAttribute('data-thumbnail-src');
    const description = element.getAttribute('data-description');
    const scheduledTime = element.getAttribute('data-scheduled-time');
    const published = element.getAttribute('data-published') === 'true';
    const viewLink = element.getAttribute('data-view-link');
    const editLink = element.getAttribute('data-edit-link');
    const deleteLink = element.getAttribute('data-delete-link');
    const isOwner = element.getAttribute('data-is-owner') === 'true';

    const root = ReactDOM.createRoot(element);
    root.render(
        <React.StrictMode>
            <VideoPlayer
                videoSrc={videoSrc}
                thumbnailSrc={thumbnailSrc}
                description={description}
                scheduledTime={scheduledTime}
                published={published}
                viewLink={viewLink}
                editLink={editLink}
                deleteLink={deleteLink}
                isOwner={isOwner}
            />
        </React.StrictMode>
    );
});

export default VideoPlayer;
