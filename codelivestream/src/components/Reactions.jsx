import React, { Component } from 'react';
//Reaction Images
import likeIcon from '../assets/icon/LIKE.gif';
import loveIcon from '../assets/icon/LOVE.gif';
import hahaIcon from '../assets/icon/HAHA.gif';
import sadIcon from '../assets/icon/SAD.gif';
import wowIcon from '../assets/icon/WOW.gif';
import angryIcon from '../assets/icon/ANGRY.gif';
//Reaction CSS
import './Reactions.css';

class Reactions extends Component {
    render() {
        return (
            <div className="reactions">
                <div className="reaction-item">
                    <img srcSet={likeIcon} alt="likeicon" />
                    <span className="countText">{this.props.like}</span>
                </div>
                <div className="reaction-item">
                    <img srcSet={loveIcon} alt="loveicon" />
                    <span className="countText">{this.props.love}</span>
                </div>
                <div className="reaction-item">
                    <img srcSet={hahaIcon} alt="hahaicon" />
                    <span className="countText">{this.props.haha}</span>
                </div>
                <div className="reaction-item">
                    <img srcSet={sadIcon} alt="sadicon" />
                    <span className="countText">{this.props.sad}</span>
                </div>
                <div className="reaction-item">
                    <img srcSet={wowIcon} alt="wowicon" />
                    <span className="countText">{this.props.wow}</span>
                </div>
                <div className="reaction-item">
                    <img srcSet={angryIcon} alt="angryicon" />
                    <span className="countText">{this.props.angry}</span>
                </div>
            </div>
        );
    }
}

export default Reactions;