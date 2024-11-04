# Project: RESTful API for a URL Shortener Service

This week, you'll build an interesting project: a RESTful API for a URL shortener service.

## Project Features

### Version 1 (v1):
- [x] **User Registration**
- [x] **User Login**: Returns an API key using Sanctum.
- [x] **URL Shortening**:
  - [x] Using the API key, users can send a long URL and receive a shortened URL in response.
  - [x] If the long URL already exists in the system, the service should return the previous shortened URL instead of creating a new one.
  - [x] Only users with a valid API key can use this service.
- [x] **Unique Short URLs**:
  - [x] Ensure all shortened URLs are unique to avoid collisions and unwanted bugs.
  - [x] If a user submits the same long URL multiple times, they should receive the same shortened URL for that long URL.
- [x] **List Registered URLs**: Users can view a list of URLs they have registered via an endpoint.
- [x] **URL Redirection**: When a shortened URL is accessed in the browser, it should redirect to the original URL (using a simple redirect web route, not an API route).

### Version 2 (v2):
- [ ] **Keep All v1 Functionalities**
- [ ] **Visit Count**: Track and display the visit count for each short URL.


## Additional Notes:
- No UI implementation is required.
- Manage multiple versions of the API.
