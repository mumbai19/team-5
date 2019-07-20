package in.zuts.trishuldonation.fragments;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.Arrays;

import in.zuts.trishuldonation.R;
import in.zuts.trishuldonation.WebActivity;

/**
 * A simple {@link Fragment} subclass.
 */
public class RecentActivities extends Fragment {

    ListView lv;

    public RecentActivities() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_recent_activities, container, false);


        String arr[]={"Article 1","Article 2 "};
        ArrayList<String> title= new ArrayList<String>(Arrays.asList(arr));
        final String link[]={"http://google.com","http://google.com"};

        lv = v.findViewById(R.id.recentactlist);
        ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(getActivity(),android.R.layout.simple_list_item_1, title);
        // Set The Adapter
        lv.setAdapter(arrayAdapter);

        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Intent intent = new Intent(getActivity(), WebActivity.class);
                intent.putExtra("url", link[i]);
                startActivity(intent);
            }
        });

        // Inflate the layout for this fragment
        return v;
    }

}
