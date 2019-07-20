package in.zuts.trishuldonation.fragments;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.razorpay.Checkout;
import com.razorpay.PaymentResultListener;

import org.json.JSONObject;

import in.zuts.trishuldonation.Payment;
import in.zuts.trishuldonation.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class PaymentFragment extends Fragment{

    private static final String TAG = PaymentFragment.class.getSimpleName();
    Button p;

    public PaymentFragment() {
        // Required empty public constructor
    }
    int money;
    String cat;
    EditText price;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View v = inflater.inflate(R.layout.fragment_payment, container, false);
        final String[] category = { "General","Women Empowerment", "Nutrition", "Education", "Skills", "Disaster", "Other"};
        cat = category[0];
        p = v.findViewById(R.id.btn_nex_pay);
        price = v.findViewById(R.id.payprice);

        Spinner spinner = v.findViewById(R.id.catspinner);
        //Creating the ArrayAdapter instance having the country list
        ArrayAdapter aa = new ArrayAdapter(getActivity(),android.R.layout.simple_spinner_item,category);
        aa.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        //Setting the ArrayAdapter data on the Spinner
        spinner.setAdapter(aa);
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                cat = category[i];
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

        p.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getActivity(), Payment.class);
                intent.putExtra("price", price.getText().toString());
                intent.putExtra("cat", cat);
                startActivity(intent);



            }
        });

        return v;
    }



}
