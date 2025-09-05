from django.db import models
from django.contrib.auth.models import User

# Create your models here.

class UserData(models.Model):
    login = models.CharField(max_length=150, unique=True, verbose_name="Nazwa użytkownika")
    password = models.CharField(max_length=128, verbose_name="Hasło")  # przechowywane jako hash, nie wprost!
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    
    imie = models.CharField(max_length=100, verbose_name="Imię")
    nazwisko = models.CharField(max_length=100, verbose_name="Nazwisko")
    email = models.EmailField(unique=True, verbose_name="Adres email")
    phone = models.CharField(max_length=20, verbose_name="Numer telefonu")

    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f"{self.login} ({self.email})"