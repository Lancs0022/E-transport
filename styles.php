<?php 
    header("content-type: text/css; charset:UTF-8");
?>
p{
    color: white;
    box-shadow: 5px 3px 2px  rgb(49, 49, 49);
    background-color: rgb(101, 92, 107);
    font-family: Arial, Helvetica, sans-seriff;
    text-align: center;
    padding: 5%;
    border: 2px grey solid;
    border-radius: 500px;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom, #87CEEB, #00008B);
    min-height: 100vh;
}

a {
    text-decoration: none;
    color: white;
}

.Navigation {
    box-shadow: 5px 3px 2px  rgb(49, 49, 49);
    background-color: rgb(101, 92, 107);
    opacity: 0.9;
    display: flex;
    justify-content: space-evenly;
    font-family: Arial, Helvetica, sans-seriff;
    text-align: center;
    padding-top: 2px;
    padding-bottom: 2px;
    border: 2px grey solid;
    border-radius: 500px;
}

.container {
    width: 50%;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    padding: 20px;
    margin-top: 5%;
}

h1 {
    text-align: center;
}

label,
input,
button {
    display: block;
    width: 100%;
    margin-bottom: 10px;
}

input,
button {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

/* Ajout d'un style pour le tableau */
table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre sous le tableau */
}

/* Style pour l'en-tête du tableau */
thead {
    background-color: #f2f2f2;
}

/* Style pour les cellules d'en-tête */
th {
    padding: 12px;
    text-align: center;
}

/* Style pour les cellules de données */
td {
    padding: 10px;
    text-align: center;
}

/* Style pour les lignes du tableau */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Style pour le titre du tableau */
.table-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Style pour le conteneur du tableau */
.table-container {
    width: 80%;
    margin: 0 auto;
    margin-top: 50px;
    padding: 20px;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}