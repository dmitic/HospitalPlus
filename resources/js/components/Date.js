import React from "react";

function Datum(props) {
    return <div className="date d-flex h-50 align-items-end justify-content-end pr-2">
    {new Intl.DateTimeFormat('sr-Latn', { 
        year: 'numeric', 
        month: 'long', 
        day: '2-digit'
      }).format(props.datum)}</div>;
}
export default Datum;