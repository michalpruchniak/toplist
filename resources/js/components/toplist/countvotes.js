import React, { Component } from 'react';
import ReactDOM from 'react-dom';



export default class Countvotes extends Component {
    constructor(props){
        super(props);
    }



    render() {

        return (
        <span className="countVotes">
            Votes: {this.props.count}
        </span>

        );
    }
}
