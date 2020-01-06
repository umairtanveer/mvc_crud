{% extends "base.php" %}

{% block title %}Home{% endblock %}

{% block body %}
  <div class="row" style="margin-top:10%">
    <div class="col-md-12">
      <h2>Customers List</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
          </tr>
        </thead>
        <tbody>
          {% for key, customer in customers %}
          <tr>
            <td>{{ key+1 }}</td>
            <td>{{ customer.first_name|e }}</td>
            <td>{{ customer.last_name|e }}</td>
            <td>{{ customer.email|e }}</td>
            <td>{{ customer.phone|e }}</td>
            <td>{{ customer.country|e }}</td>
          </tr>
          {% endfor %}
        </tbody>
      </table>
    </div>
    </div>
  </div>

{% endblock %}
