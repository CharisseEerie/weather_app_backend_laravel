<h1 align="center">
  ☁️ <strong>Weather&nbsp;API</strong> ☁️  
  <br>
  <span style="font-size:3rem;">☀️</span>
</h1>

A lightweight **Laravel 9** service that returns live weather data for **Nairobi, Kenya**.  
It powers the decoupled **Next JS** Weather App frontend.

---

## Endpoint

| Method | URL            | Description                                   |
|--------|----------------|-----------------------------------------------|
| GET    | `/api/weather` | Current temperature, humidity, wind, condition |

<details>
<summary>Example&nbsp;JSON&nbsp;response</summary>

```json
{
  "name": "Nairobi",
  "main": { "temp": 24.6, "humidity": 47 },
  "weather": [ { "description": "few clouds" } ],
  "wind": { "speed": 3.09 }
}
