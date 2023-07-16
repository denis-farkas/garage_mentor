import React from "react";

const Content = ({ paginated }) => {
  return (
    <>
      {paginated.map((occasion) => (
        <div className="col-lg-4 col-md-3 col-sm-8 my-3" key={occasion.id}>
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
    </>
  );
};
export default Content;
