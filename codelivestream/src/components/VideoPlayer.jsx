import React, { Component } from 'react';
import ReactPlayer from 'react-player';
import { VIDEO_LINK } from '../config.js';
import './VideoPlayer.css';
class VideoPlayer extends Component {
    state = {
        url: VIDEO_LINK,
        playing: true,
        controls: true,
        volume: 0.8,
        muted: false,
        loop: true
    }
    render() {
        const { url, playing, controls, volume, muted, loop } = this.state
        return (
            <div className="videoplayer">
                <ReactPlayer
                    className='react-player'
                    width="100%"
                    height="100%"
                    url={url}
                    playing={playing}
                    controls={controls}
                    loop={loop}
                    volume={volume}
                    muted={muted}
                />
            </div>
        );
    }
}

export default VideoPlayer;