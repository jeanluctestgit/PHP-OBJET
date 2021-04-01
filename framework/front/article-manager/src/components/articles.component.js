import React, { Component } from 'react'
import axios from 'axios';
import { Button } from 'bootstrap';
export default class Articles extends Component {

    constructor(props){
        super(props);
        this.state = {
            articles : []
        }
    }
    componentDidMount(){
        axios.get("http://127.0.0.1:4321/articles")
        .then(res => {
          console.log(res.data);
          const articles = res.data;
          this.setState({ articles });
        })
    }

    deleteArticle(e,id){
        axios.delete("http://127.0.0.1:4321/articles/" + id)
        .then(res => {
          console.log(res.data);
          const articles = res.data;
          this.setState({ articles });
        })
    }

    render() {
        return (
            <div className="container">
              <div className = "card">
                 <div className = "card-header">
                     Liste des articles
                 </div>
                 <div className = "card-body">
                 <ul className="list-group">
                    {
                        this.state.articles.map(a => {
                            return (
                                <li className = "list-group-item">
                                    <span className="float-left">
                                    {
                                        a.titre
                                    }
                                     <div className = "blockquote-footer">
                                      créé par { a.auteur } Le {a.date}
                                     </div>
                                    </span>
                                    <span className = "float-right">
                                      <button className="btn btn-danger mr-1" onClick = {(e) => this.deleteArticle(e,a.id) }>X</button>
                                      <button className="btn btn-primary">Update</button>
                                    </span>
                                </li>
                            )
                        })
                    }
                </ul>
                 </div>
              </div>
                
            </div>
        )
    }
}
