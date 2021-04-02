import React, { Component } from "react";
import axios from "axios";
import { Button } from "bootstrap";
export default class Articles extends Component {
  constructor(props) {
    super(props);
    this.state = {
      articles: [],
      currentArticle: null,
      formTitle: "",
      buttonTitle: "",
      titre: "",
      auteur: "",
      date: "",
      image: "",
      message: "",
    };
    this.handleTitreChange = this.handleTitreChange.bind(this);
    this.handleAuteurChange = this.handleAuteurChange.bind(this);
    this.handleDateChange = this.handleDateChange.bind(this);
    this.handleImageChange = this.handleImageChange.bind(this);
    this.handleMessageChange = this.handleMessageChange.bind(this);
  }
  componentDidMount() {
    var proxy = "http://127.0.0.1:4321/articles";
    axios.get(proxy).then((res) => {
      console.log(res.data);
      const articles = res.data;
      this.setState({ articles: articles });
    });
    this.setState({ formTitle: "Ajouter un article", buttonTitle: "Ajouter" });
  }

  componentDidUpdate() {
    
  }

  deleteArticle(e, id) {
    var proxy = "http://127.0.0.1:4321/articles/" + id;
    axios.delete(proxy).then((res) => {
      console.log(res.data);
      const articles = res.data;
      this.setState({ articles });
    });
  }

  getArticle(e, id) {
    axios.get("http://127.0.0.1:4321/articles/" + id).then((res) => {
      console.log(res.data);
      const article = res.data;
      this.setState({
        titre: article.titre,
        auteur: article.auteur,
        date: article.date,
        image: article.image,
        message: article.message,
      });
    });
    this.setState({
      formTitle: "Modifier un article",
      buttonTitle: "Modifier",
    });
  }

  updateArticle(e, id) {
    alert('toto');
    e.preventDefault();
    
    const article = {};
    let frmData = new FormData(document.querySelector("#article"));
    article.titre = frmData.get("titre");
    article.auteur = frmData.get("auteur");
    article.date = frmData.get("date");
    article.image = frmData.get("image");
    article.message = frmData.get("message");
    axios.put("http://127.0.0.1:4321/articles/" + id , article).then((res) => {
      console.log(res.data);
      const article = res.data;
      this.setState({ currentArticle: article });
    });
    
  }

  addArticle(e) {
    alert('titi');
    e.preventDefault();
    const article = {};
    let frmData = new FormData(document.querySelector("#article"));
    article.titre = frmData.get("titre");
    article.auteur = frmData.get("auteur");
    article.date = frmData.get("date");
    article.image = frmData.get("image");
    article.message = frmData.get("message");

    axios
      .post("http://127.0.0.1:4321/articles", article)
      .then((res) => {
        console.log(res.data);
        const articles = res.data;
        this.setState({ articles: articles });
      })
      .catch((error) => {
        console.error("There was an error!", error);
      });

      
  }

  handleTitreChange(e) {
    this.setState({
      titre: e.target.value,
    });
  }

  handleAuteurChange(e) {
    this.setState({
      auteur: e.target.value,
    });
  }
  handleDateChange(e) {
    this.setState({
      date: e.target.value,
    });
  }
  handleImageChange(e) {
    this.setState({
      image: e.target.value,
    });
  }
  handleMessageChange(e) {
    this.setState({
      message: e.target.value,
    });
  }

  render() {
    return (
      <div className="container">
        <div className="card mb-3">
          <div className="card-header">{this.state.formTitle}</div>
          <div className="card-body p-3">
            <form id="article">
              <div class="row">
                <div className="form-group col">
                  <label className="float-left" for="titre">
                    Titre
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    name="titre"
                    id="titre"
                    value={this.state.titre}
                    onChange={this.handleTitreChange}
                  />
                </div>
                <div className="form-group col">
                  <label for="id"></label>
                  <input
                    type="hidden"
                    class="form-control"
                    name="id"
                    id="id"
                    value={
                      this.state.currentArticle
                        ? this.state.currentArticle.id
                        : ""
                    }
                  />
                </div>
              </div>
              <div class="row">
                <div className="form-group col">
                  <label className="float-left" for="auteur">
                    Auteur
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    name="auteur"
                    id="auteur"
                    value={this.state.auteur}
                    onChange={this.handleAuteurChange}
                  />
                </div>
                <div className="form-group col">
                  <label className="float-left" for="Date">
                    Date
                  </label>
                  <input
                    type="date"
                    class="form-control"
                    name="date"
                    id="date"
                    value={this.state.date}
                    onChange={this.handleDateChange}
                  />
                </div>
                <div className="form-group col">
                  <label className="float-left" for="image">
                    Image
                  </label>
                  <select
                    className="form-control"
                    name="image"
                    id="image"
                    value={this.state.image}
                    onChange={this.handleImageChange}
                  >
                    <option value="JPEG">JPEG</option>
                    <option value="PNG">PNG</option>
                    <option value="BMP">BMP</option>
                  </select>
                </div>
              </div>
              <div className="form-group">
                <label for="message">Message</label>
                <textarea
                  class="form-control"
                  name="message"
                  id="message"
                  rows="3"
                  value={this.state.message}
                  onChange={this.handleMessageChange}
                ></textarea>
              </div>
              <div className="form-group float right">
                <button
                  className="btn btn-primary"
                  onClick={
                    this.state.buttonTitle === "Ajouter"
                      ? (e) => {
                          alert("ajout");
                          this.addArticle(e)
                        }
                      : (e) =>
                          {
                              alert('update ')
                              this.updateArticle(e, this.state.currentArticle.id)
                          }
                  }
                >
                  {this.state.buttonTitle}
                </button>
              </div>
            </form>
          </div>
        </div>
        <div className="card">
          <div className="card-header">Liste des articles</div>
          <div className="card-body">
            <ul className="list-group">
              {this.state.articles.map((a) => {
                return (
                  <li className="list-group-item">
                    <span className="float-left" style={{ textAlign: "left" }}>
                      {a.titre}
                      <div className="blockquote-footer">
                        créé par {a.auteur} Le {a.date}
                      </div>
                    </span>
                    <span className="float-right">
                      <button
                        className="btn btn-danger mr-1"
                        onClick={(e) => this.deleteArticle(e, a.id)}
                      >
                        X
                      </button>
                      <button
                        className="btn btn-primary"
                        onClick={(e) => this.getArticle(e, a.id)}
                      >
                        Update
                      </button>
                    </span>
                  </li>
                );
              })}
            </ul>
          </div>
        </div>
      </div>
    );
  }
}
