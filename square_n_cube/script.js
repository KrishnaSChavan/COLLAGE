function calculateSquaresAndCubes() {
    const resultTableBody = document.getElementById("resultTableBody");
    const tableCodeContainer = document.getElementById("tableCodeContainer");
    const tableCode = `<table>
  <thead>
    <tr>
      <th>Number</th>
      <th>Square</th>
      <th>Cube</th>
    </tr>
  </thead>
  <tbody>
    ${generateTableRows()}
  </tbody>
</table>`;

    let i = 0;
    const interval = setInterval(() => {
      if (i <= 10) {
        const square = i * i;
        const cube = i * i * i;

        const row = document.createElement("tr");
        const numberCell = document.createElement("td");
        const squareCell = document.createElement("td");
        const cubeCell = document.createElement("td");

        numberCell.textContent = i;
        squareCell.textContent = square;
        cubeCell.textContent = cube;

        row.appendChild(numberCell);
        row.appendChild(squareCell);
        row.appendChild(cubeCell);

        resultTableBody.appendChild(row);
        i++;
      } else {
        clearInterval(interval);
        tableCodeContainer.innerHTML = `<div class="table-code">${tableCode}</div>`;
        tableCodeContainer.classList.remove("blinking");
      }
    }, 100);
  }

  function generateTableRows() {
    let rows = "";
    for (let i = 0; i <= 10; i++) {
      const square = i * i;
      const cube = i * i * i;

      rows += `
    <tr>
      <td>${i}</td>
      <td>${square}</td>
      <td>${cube}</td>
    </tr>`;
    }
    return rows;
  }

  calculateSquaresAndCubes();