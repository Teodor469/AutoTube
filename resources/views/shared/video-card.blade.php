<div class="video-player"
     data-video-src="{{ asset($video->video_path) }}"
     data-thumbnail-src="{{ asset($video->thumbnail) }}"
     data-description="{{ $video->description }}"
     data-scheduled-time="{{ $video->scheduled_time ? $video->scheduled_time->format('F j, Y, g:i a') : 'No scheduled time' }}"
     data-published="{{ $video->published ? 'true' : 'false' }}">
</div>
