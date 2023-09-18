import { Fragment } from "react";
import "./App.css";
import { useQuery } from "react-query";


function App() {

  const { isLoading, error, data } = useQuery({
    queryKey: ['serversData'],
    queryFn: () =>
      fetch('http://localhost:8000/server').then(
        (res) => res.json(),
      ),
  })

  console.log(isLoading);
  console.log(error);
  console.log(data);

  return (
    <Fragment>
      <div className="card">
        <a href="https://www.leaseweb.com/nl" target="_blank">
          <img
            src="https://developer.leaseweb.com/images/leaseweb_logo.png"
            className="logo"
            alt="Leaseweb"
          />
        </a>

        <div className="list">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Model</th>
                <th>RAM</th>
                <th>HDD</th>
                <th>Location</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Intel Xeon E3-1230v6</td>
                <td>64 GB</td>
                <td>2x 2 TB</td>
                <td>Amsterdam</td>
                <td>€ 69</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </Fragment>
  );
}

export default App;
