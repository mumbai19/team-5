package in.zuts.trishuldonation;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class LoginActivity extends AppCompatActivity {
    EditText username; // This will be a reference to our username input.
    EditText password;
    Button login;  // This is a reference to the login button.
    SharedPreferences pref;
    RequestQueue requestQueue;  // This is our requests queue to process our HTTP requests.
    Intent intent;
    String baseUrl = "http://192.168.43.122:3000";  // This is the API base URL (GitHub API)
    String url;  // This will hold the full URL which will include the username entered in the etGitHubUser.
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        this.username = (EditText) findViewById(R.id.editText3);  // Link our user text box.
        this.login = (Button) findViewById(R.id.button);  // Link our clicky button.
        this.password = (EditText) findViewById(R.id.editText);
        pref = getSharedPreferences("user_details",MODE_PRIVATE);
        intent = new Intent(getApplicationContext(),MainActivity.class);
        if(pref.contains("username") && pref.contains("password")){
            startActivity(intent);
            finish();
        }
        requestQueue = Volley.newRequestQueue(this);
    }

    public void onClickLogin(View v){
        Log.e("Volley",username.getText().toString());
        Log.e("Volley",password.getText().toString());
        login(username.getText().toString(),password.getText().toString());
    }

    private void login(String username, String password) {
        // First, we insert the username into the repo url.
        // The repo url is defined in GitHubs API docs (https://developer.github.com/v3/repos/).
        this.url = this.baseUrl + "/login";

        HashMap<String, String> params = new HashMap<>();
        params.put("email", username);
        params.put("password", password);

        // Next, we create a new JsonArrayRequest. This will use Volley to make a HTTP request
        // that expects a JSON Array Response.
        // To fully understand this, I'd recommend readng the office docs: https://developer.android.com/training/volley/index.html
        JsonObjectRequest arrReq = new JsonObjectRequest(Request.Method.POST, url, new JSONObject(params),
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {

                        try {
                            Log.e("Volley",response.toString());
                            String code = response.get("code").toString();
                            String usrname = response.get("username").toString();
                            String id = response.get("id").toString();
                            if(code.equals("200")){
                                SharedPreferences.Editor editor = pref.edit();
                                editor.putString("username",usrname);
                                editor.putString("id",id);
                                editor.commit();
                                startActivity(intent);
                                finish();
                            }
                            else
                            {
                                Toast.makeText(getApplicationContext(),response.get("success").toString(),Toast.LENGTH_LONG).show();
                            }
                        } catch (JSONException e) {
                            // If there is an error then output this to the logs.
                            Log.e("Volley", "Invalid JSON Object.");
                        }

                    }
                },

                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        // If there a HTTP error then add a note to our repo list.
//                        setRepoListText("Error while calling REST API");
                        Log.e("Volley", error.toString());
                    }
                }
        );
        // Add the request we just defined to our request queue.
        // The request queue will automatically handle the request as soon as it can.
        arrReq.setRetryPolicy(new DefaultRetryPolicy(500000,
                DefaultRetryPolicy.DEFAULT_MAX_RETRIES,
                DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        requestQueue.add(arrReq);
    }
}
