import React, { Component } from 'react';
import Loading from './Loading';


export default class Voteelements extends Component {
    constructor(props){
        super(props);
        axios.defaults.baseURL = "http://localhost:8000";
        this.vote = this.vote.bind(this);
        this.state = {elements: [], loading: true, error: false};
    }
    vote(id){
        const vote = {
            element_id: id
        }

        axios.post(`ajax/vote`, { vote })
      .then(res => {
        console.log(res);
        console.log(res.data);
      })
        this.getElements();
    }
    componentDidMount(){
        this.getElements();
    }
    getElements(){
        const id = this.props.id;


        axios.get(`ajax/displayelements/` + id)
        .then(res => {
          const elements = res.data;
          this.setState({ elements, loading: false });
        }).catch(error => {
            this.setState({ error });
        })
    }
    render(){
        if(this.state.loading == true){
            return <Loading />
        } else {
            return(
                <ul className="toplistElements">
                    { this.state.elements.map(element => <li key={element.id}>
                        <div onClick={() => this.vote(element.id)} className="singleElement"  style ={ { backgroundImage: "url("+element.photo+")" } }>
                        </div>
                    </li>)}
                </ul>
            );
        }

    }

}
