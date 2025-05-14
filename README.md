# 💘 AppCites (LoveConnect) – Aplicació de Cites en Laravel

**AppCites**, també coneguda com a **LoveConnect**, és una aplicació web de cites desenvolupada com a part del projecte **ProjecteDWES** (Desenvolupament Web en Entorn Servidor).  
El seu objectiu principal és proporcionar una plataforma on els usuaris es puguin registrar, configurar les seves preferències i connectar-se amb altres persones per trobar parella, intercanviar missatges i gestionar sol·licituds de cites.

---

## 🧭 Objectiu de l’Aplicació

LoveConnect permet als usuaris:

- Crear i personalitzar perfils amb informació detallada i preferències.
- Cercar possibles parelles basant-se en criteris específics.
- Comunicar-se mitjançant un sistema de missatgeria interna.
- Programar i gestionar cites amb altres usuaris.

---

## 🧩 Característiques Principals

- **Cerca de Parella**: Cerca de coincidències segons les preferències personals.
- **Missatgeria**: Enviament i recepció de missatges entre usuaris.
- **Cites**: Sol·licitud, acceptació o rebuig de cites.
- **Gestió de Perfil**: Actualització de dades i preferències en qualsevol moment.

---

## 🏗️ Arquitectura del Sistema

El projecte segueix el patró arquitectònic **Model-Vista-Controlador (MVC)**, proporcionat per Laravel, que separa la lògica, les dades i la presentació.

### Components Principals

- **Models**: Entitats del sistema (usuaris, preferències, missatges, cites).
- **Controladors**: Gestionen la lògica de negoci.
- **Vistes**: Plantilles Blade per a la interfície d’usuari.
- **Rutes**: Defineixen endpoints i la seva lògica associada.

---

## 🖥️ Interfície d’Usuari

La interfície està dissenyada amb **Bootstrap** per garantir compatibilitat amb dispositius mòbils i una experiència fluida.

### Navegació Principal

- 🔍 **Cercar Parella**  
- 💬 **Missatges**  
- 📅 **Cites**  
- 👤 **Perfil**  

### Panell de Control

Accés ràpid a funcionalitats mitjançant targetes interactives amb informació rellevant i accions habituals.

---

## ⚙️ Implementació Tècnica

- **Framework**: Laravel  
- **Frontend**: Bootstrap  
- **Plantilles**: Blade  
- **Base de dades**: MySQL  
- **Emmagatzematge**: Fotografies de perfil

---

## 🛠️ Requisits del Sistema

- Servidor web amb suport per a **PHP**
- Base de dades **MySQL**
- Navegador web actual
- Suport per a **sessions** i **emmagatzematge d’arxius**

---

## 📄 Llicència

Aquest projecte és de caràcter educatiu i forma part del cicle de Desenvolupament d’Aplicacions Web.  
Pots fer-lo servir com a base per a projectes personals o pràctiques.

Per més informació del projecte, pots consultar-ho a **Deepwiki** [aquí](https://deepwiki.com/ikerbuded/AppCites-ProjecteDWES).
