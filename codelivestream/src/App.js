import React, { Component } from 'react';
import GetReactions from './layouts/GetReactions';
import GetComments from './layouts/GetComments';
import VideoPlayer from './components/VideoPlayer';
import './App.css';

class App extends Component {
  render() {
    return (
      <div className="main-content">
        <GetReactions />
        <VideoPlayer />
        <GetComments />
      </div>
    );
  }
}

export default App;
