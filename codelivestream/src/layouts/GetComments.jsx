import React, { Component } from 'react';
import axios from 'axios';
import { FB_GRAPH, ACCESS_TOKEN, POST_ID, COMMENTS_TIMEOUT } from '../config.js';
import Comments from '../components/Comments';

class GetComments extends Component {
    constructor(props) {
        super(props);
        this.after = '';
        this.state = {
            comments: []
        }
    }

    componentDidMount() {
        this.getComment();
        this.interval = setInterval(() => {
            this.getComment();
        }, COMMENTS_TIMEOUT);
    }

    getComment() {
        axios.get(`${FB_GRAPH}${POST_ID}/comments?fields=message,from{name,picture}&limit=50&access_token=${ACCESS_TOKEN}&after=${this.after}`)
            .then(res => {
                if (res.data.data.length > 0) {
                    this.after = res.data.paging.cursors.after;
                    this.setState({ comments: [...res.data.data, ...this.state.comments] });
                }
            })
            .catch(err => {
                console.log(err);
            })
    }
    render() {
        return (
            <div className="comments">
                {this.state.comments.map((comment, key) => <Comments key={key} imageSrc={comment.from.picture} name={comment.from.name} message={comment.message} />)}
            </div>
        );
    }
}

export default GetComments;