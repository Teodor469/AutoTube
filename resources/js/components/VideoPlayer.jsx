import React, { useEffect, useRef, useState } from 'react';
import ReactDOM from 'react-dom/client';

const VideoPlayer = ({ videoSrc, thumbnailSrc, description, scheduledTime, published }) => {
  const [isThumbnailVisible, setThumbnailVisible] = useState(true);
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
          {isThumbnailVisible && thumbnailSrc && (
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
      </div>
    </div>
  );
};

export default VideoPlayer;

document.querySelectorAll('.video-player').forEach(element => {
  const videoSrc = element.getAttribute('data-video-src');
  const thumbnailSrc = element.getAttribute('data-thumbnail-src');
  const description = element.getAttribute('data-description');
  const scheduledTime = element.getAttribute('data-scheduled-time');
  const published = element.getAttribute('data-published') === 'true';

  const root = ReactDOM.createRoot(element);
  root.render(
    <React.StrictMode>
      <VideoPlayer
        videoSrc={videoSrc}
        thumbnailSrc={thumbnailSrc}
        description={description}
        scheduledTime={scheduledTime}
        published={published}
      />
    </React.StrictMode>
  );
});
