import React, { Component } from 'react';
import './Comments.css';

class Comments extends Component {
    render() {
        return (
            <div className="comment_item">
                <div className="avatar">
                    <img srcSet={this.props.imageSrc} alt="Avatar"/>
                </div>
                <div className="content">
                    <span className="name">{this.props.name} </span>
                    <span className="message">{this.props.message}</span>
                </div>
            </div>
        );
    }
}

export default Comments;