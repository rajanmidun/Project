package programs.com.prediction.heart;

import java.util.HashMap;
import java.util.Map;
import javax.swing.JFrame;
import programs.Output;
import programs.com.prediction.heart.nb.NaiveBayesClassifier;

/**
 *
 * @author Rajan
 */
public class Process1 {

    public String result = "";

    public Process1(double age, double gender, double chestpain, double cigratte,
                                double cigratteyear, double restecg, double hp, double lp,
                                double pulserate, double colestrol, double familyhis, double alcohol) {
        try {

            Map<QuestionType, Double> paramaters = new HashMap<QuestionType, Double>();
            paramaters.put(QuestionType.GENDER, gender);
            paramaters.put(QuestionType.AGE, age);
            paramaters.put(QuestionType.ALCH, alcohol);
            paramaters.put(QuestionType.F_H, familyhis);
            paramaters.put(QuestionType.CIGS, cigratte);
            paramaters.put(QuestionType.YEAR, cigratteyear);
            paramaters.put(QuestionType.H_BP, hp);
            paramaters.put(QuestionType.L_BP, lp);
            paramaters.put(QuestionType.PULSERATE, pulserate);
            paramaters.put(QuestionType.CHOLESTEROL, colestrol);
            paramaters.put(QuestionType.CHEST_PAIN, chestpain);
            paramaters.put(QuestionType.REST_ECG, restecg);

            String dataFile = "rajandata.arff";
            String modelFile = "rajanmodel.model";
            //NaiveBayes algortithm starts..
            System.out.println("NaiveBayes Algorithm Starts....");
           

            NaiveBayesClassifier.train(dataFile, modelFile);
            result = NaiveBayesClassifier.medicalBot(modelFile, paramaters);
        } catch (Exception e) {
            e.printStackTrace();
        }

        Output output = new Output();
        output.setVisible(true);
        output.diseaseResult(result);
        output.recommendation(hp, lp, alcohol, pulserate, colestrol);
        output.setSize(900, 610);
        output.setLocationRelativeTo(null);
        output.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

    }

}
