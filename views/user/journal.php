<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

{{ include('layouts/header.php', {title: 'Journal de bord'}) }}
<h1>Journal de bord</h1>

<table>
    <thead>
        <tr>
            <th>Adresse IP</th>
            <th>Date</th>
            <th>Nom Utilisateur</th>
            <th>Page visitée</th>
        </tr>
    </thead>
    <tbody>
        {% for ligne in journal %}
        <tr>
            <td>{{ ligne.ip }}</td>
            <td>{{ ligne.date }}</td>
            <td>{{ ligne.username }}</td>
            <td>{{ ligne.page }}</td>
        </tr>
        {% endfor %}

        <button onclick="genererPDF()" class="btn-export-pdf"> Télécharger le journal en PDF</button>

    </tbody>
</table>
{{ include('layouts/footer.php') }}

<script>
  async function genererPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.setFontSize(16);
    doc.text("Journal de bord", 14, 15);

    const headers = [["Adresse IP", "Date", "Nom utilisateur", "Page visitée"]];

    const data = [];
    const rows = document.querySelectorAll("table tbody tr");

    rows.forEach(row => {
      const cells = row.querySelectorAll("td");
      const ligne = [];
      cells.forEach(cell => ligne.push(cell.textContent.trim()));
      data.push(ligne);
    });

    doc.autoTable({
      head: headers,
      body: data,
      startY: 25,
      styles: {
        fontSize: 10
      }
    });

    doc.save("journal.pdf");
  }
</script>


