import React, { useState, useEffect } from "react";

import Pagination from "../components/Pagination";

export default function Occasions() {
  const [initialOccas, setInitialOccas] = useState([]);
  const [occasions, setOccasions] = useState([]);
  const [loading, setLoading] = useState(true);
  const [currentPage, setCurrentPage] = useState(1);
  const [prix, setPrix] = useState(0);
  const [kilometre, setKilometre] = useState(300000);
  const [an, setAn] = useState(20);
  const itemsPerPage = 5;

  useEffect(() => {
    fetchDatas();
  }, []);

  async function fetchDatas() {
    try {
      const response = await fetch("/api", {
        headers: {
          Accept: "application/json",
        },
      }).then((r) => r.json());
      setOccasions(response);
      setInitialOccas(response);
      setLoading(false);
    } catch (error) {
      console.log(error);
    }
  }

  let paginated = Pagination.getData(occasions, currentPage, itemsPerPage);
  const handlePageChange = (page) => {
    event.preventDefault();
    setCurrentPage(page);
  };
  const handleSubmit = (e) => {
    e.preventDefault();
    console.log("Sending");
  };

  const resetFiltres = () => {
    setPrix(0);
    setAn(20);
    setKilometre(300000);
    setOccasions(initialOccas);
    setCurrentPage(1);
    paginated = Pagination.getData(occasions, currentPage, itemsPerPage);
  };

  const handleFiltres = () => {
    let result = [];
    for (let i = 0; i < occasions.length; i += 1) {
      let checkPrix = false;
      let checkKilometre = false;
      let checkAn = false;

      let prixOccasion = occasions[i].prix;
      console.log(prixOccasion);
      console.log(prix);
      if (prixOccasion < prix) {
        checkPrix = true;
      }

      let kiloOccasion = occasions[i].kilometrage;
      if (kiloOccasion < kilometre) {
        checkKilometre = true;
      }

      let anOccasion = occasions[i].year;
      if (anOccasion < an) {
        checkAn = true;
      }

      if (checkPrix && checkKilometre && checkAn) {
        result.push(occasions[i]);
      }
    }
    setOccasions(result);
    console.log(result);
    setCurrentPage(1);
    paginated = Pagination.getData(occasions, currentPage, itemsPerPage);
  };

  return (
    <div className="w-100">
      {loading && (
        <div className="wrapper">
          <div className="rubik-loader"></div>
        </div>
      )}
      {!loading && (
        <>
          <h3 className="text-center w-100 mt-4 white">Filtres</h3>
          <form
            className="d-flex flex-row py-lg-2 w-75 mx-auto"
            onSubmit={handleSubmit}
          >
            <fieldset className="form-group">
              <label htmlFor="prix" className="form-label my-4 white">
                Prix Max<span> {prix} Euros</span>
              </label>
              <input
                type="range"
                className="w-100"
                min="0"
                max="300000"
                step="1000"
                id="prix"
                value={prix}
                onChange={(e) => {
                  setPrix(e.target.value);
                }}
              />
            </fieldset>
            <fieldset className="form-group">
              <label htmlFor="prix" className="form-label my-4 white">
                Kilométres Max<span> {kilometre} Km</span>
              </label>
              <input
                type="range"
                className="w-100"
                min="0"
                max="300000"
                step="5000"
                id="kilo"
                value={kilometre}
                onChange={(e) => {
                  setKilometre(e.target.value);
                }}
              />
            </fieldset>
            <fieldset className="form-group">
              <label htmlFor="annee" className="form-label my-4 white">
                Années Max<span> {an}</span>
              </label>
              <input
                type="range"
                className="w-100"
                min="0"
                max="20"
                step="1"
                id="annee"
                value={an}
                onChange={(e) => {
                  setAn(e.target.value);
                }}
              />
            </fieldset>
          </form>
          <div className="d-flex justify-content-center w-100">
            <button
              className="btn btn-primary my-2 w-25"
              onClick={handleFiltres}
            >
              Appliquer les filtres
            </button>
            <button
              className="btn btn-secondary my-2 w-25 mx-3"
              onClick={resetFiltres}
            >
              Effacer les filtres
            </button>
          </div>

          <div className="row py-lg-2 justify-content-around" id="test">
            {paginated.map((occasion) => (
              <div
                className="col-lg-4 col-md-3 col-sm-8 my-3"
                key={occasion.id}
              >
                <div className="card h-100">
                  <img
                    src={`${occasion.image}`}
                    className="card-img-top img-fluid py-3 px-3"
                    alt="{ occasion.marque }"
                  />
                  <div className="card-body">
                    <div className="row">
                      <div className="col-lg-6 col-sm-12">
                        <h4 className="card-title">{occasion.marque}</h4>
                        <p className="card-text">{occasion.motorisation}</p>
                        <h4 className="card-title">{occasion.prix} Euros</h4>
                      </div>
                      <div className="col-lg-6 col-sm-12">
                        <h5 className="card-title">{occasion.modele}</h5>
                        <p className="card-text">{occasion.kilometrage} km</p>
                        <p className="card-text">{occasion.places} places</p>
                      </div>
                    </div>
                  </div>
                  <a
                    href={`/occasion/${occasion.id}`}
                    className="btn btn-dark my-2 w-50 mx-auto"
                  >
                    Détails
                  </a>
                </div>
              </div>
            ))}

            {itemsPerPage < occasions.length && (
              <div className="d-flex flex-row justify-content-center py-2">
                <Pagination
                  currentPage={currentPage}
                  itemsPerPage={itemsPerPage}
                  length={occasions.length}
                  onPageChanged={handlePageChange}
                />
              </div>
            )}
          </div>
        </>
      )}
    </div>
  );
}
