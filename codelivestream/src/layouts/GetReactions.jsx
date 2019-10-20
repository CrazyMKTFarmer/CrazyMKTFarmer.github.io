import React, { Component } from 'react';
import axios from 'axios';
import { FB_GRAPH, ACCESS_TOKEN, POST_ID, REACTIONS_TIMEOUT } from '../config.js';
import Reactions from '../components/Reactions';

const PARAMS = 'like,love,wow,haha,sad,angry'.split(',').map(type => `reactions.type(${type.toUpperCase()}).limit(0).summary(total_count).as(${type})`).join(',');
class GetReactions extends Component {
  constructor(props) {
    super(props);
    this.state = {
      like: '',
      love: '',
      haha: '',
      sad: '',
      wow: '',
      angry: ''
    }
  }

  componentDidMount() {
    this.getReactions();
    this.interval = setInterval(() => {
      this.getReactions();
    }, REACTIONS_TIMEOUT);
  };

  getReactions() {
      axios.get(`${FB_GRAPH}${POST_ID}?fields=${PARAMS}&access_token=${ACCESS_TOKEN}`)
      .then((post) => {
        this.setState({
          like: post.data.like.summary.total_count,
          love: post.data.love.summary.total_count,
          haha: post.data.haha.summary.total_count,
          sad: post.data.sad.summary.total_count,
          wow: post.data.wow.summary.total_count,
          angry: post.data.angry.summary.total_count
        });
      });
  }

  componentWillUnmount() {
    clearInterval(this.interval);
  }

  render() {
    const { like, love, haha, sad, wow, angry } = this.state
    return (
      <Reactions like={like} love={love} haha={haha} sad={sad} wow={wow} angry={angry} />
    );
  }
}

export default GetReactions;